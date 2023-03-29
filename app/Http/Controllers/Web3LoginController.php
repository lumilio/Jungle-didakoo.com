<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

use Illuminate\Support\Facades\DB;
use Elliptic\EC;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use kornrunner\Keccak;
use App\Userethwallet;
use App\Player;

class Web3LoginController extends Controller
{
    public function message(): string
    {  
        $nonce = Str::random();
        $message = "Sign this message to confirm you own this wallet address. This action will not cost any gas fees.\n\nNonce: " . $nonce;
    //    Session::put('sign_message','Sign this message to confirm');
        return $message;
    }

    public function verify(Request $request): string
    {
        $result = $this->verifySignature($request->input('message'), $request->input('signature'), $request->input('address'));

        //*******Check if address already exists or not */
        $player_wallet_details = DB::table('players')->where('wallet_address', $request->input('address'))->first();
       
        if($player_wallet_details)
        {
            Session::put('userSession',$player_wallet_details->wallet_address);
        }

        // If $result is true, perform additional logic like logging the user in, or by creating an account if one doesn't exist based on the Ethereum address

        if($result == true) {
            Session::put('loggedIn', 'success');
        }
        return ($result ? 'OK' : 'ERROR');
    }

    protected function verifySignature(string $message, string $signature, string $address): bool
    {
        $hash = Keccak::hash(sprintf("\x19Ethereum Signed Message:\n%s%s", strlen($message), $message), 256);
        $sign = [
            'r' => substr($signature, 2, 64),
            's' => substr($signature, 66, 64),
        ];
        $recid = ord(hex2bin(substr($signature, 130, 2))) - 27;

        if ($recid != ($recid & 1)) {
            return false;
        }

        $pubkey = (new EC('secp256k1'))->recoverPubKey($hash, $sign, $recid);
        $derived_address = '0x' . substr(Keccak::hash(substr(hex2bin($pubkey->encode('hex')), 1), 256), 24);

        return (Str::lower($address) === $derived_address);
    }

    public function register(Request $request)
    {       
        $validatedData = $request->validate([
            'ethwalletaddr'     => 'required|min:42|max:42|unique:userethwallets',
            'balance'           => 'required|string|min:2|max:255',
            'alias'             => 'required|string|min:3|max:255'
        ]);

        Player::create([
            'wallet_address'     => $validatedData['ethwalletaddr'],
            'balance'           => $validatedData['balance'],
            'alias'             => $validatedData['alias']
        ]);
     
        return "SUCCESS";

    }

    public function update(Request $request)
    {
        $data = $request->input();
        $ethwalletaddr = $data['ethwalletaddr'];
        $balance = $data['balance'];

        DB::update('update players set balance = ? where wallet_address = ?',[$balance, $ethwalletaddr]);

        $player_wallet_details = DB::table('players')->where('wallet_address', $ethwalletaddr)->first();
       
        if($player_wallet_details)
        {
            Session::put('userSession',$ethwalletaddr);
        }   

        return "SUCCESS";
    }

    public function getSession()
    {
        return Session::has('loggedIn') ? Session::get('loggedIn') : 'failed';
    }
    public function logout()
    {
        Session::forget('loggedIn');
        return true;
    }

    //Get users

    public function getUsers()
    {
        $players = Player::all()->toArray();
        echo json_encode(['playersData'=>$players]);
    }
}
