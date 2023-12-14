import MonkeyIconBlack from '../../images/board/animals/monkey_5.png';
import MonkeyIconWhite from '../../images/board/animals/monkey_6.png';
import LionIconBlack from '../../images/board/animals/lion_5.png';
import LionIconWhite from '../../images/board/animals/lion_6.png';
import CatIconBlack from '../../images/board/animals/cat_5.png';
import CatIconWhite from '../../images/board/animals/cat_6.png';
import NikeIcon from '../../images/extra_objects/nike.png';
import AdidasIcon from '../../images/extra_objects/adidas.png';
import WBIcon from '../../images/extra_objects/wb.png';
import PepsiIcon from '../../images/extra_objects/pepsi.png';
import LacosteIcon from '../../images/extra_objects/coco.png';
import LandIcon from '../../images/extra_objects/palm.png';
import SandboxIcon from '../../images/extra_objects/mario.png';


export default function colorIconNft(colorIcon){
    return {
        nft_1_sunflower_1: '',
        nft_2_sunflower_2: '',
        nft_3_battery: '',
        nft_4_color1: '',
        nft_5_color2: '',
        nft_6_color3: '',
        nft_7_color4: '',
        nft_8_bot: '',
        nft_21_raygun: '',
        nft_9_cat: (colorIcon === 3 || colorIcon === 5) ? CatIconWhite : CatIconBlack,
        nft_10_monkey: (colorIcon === 3 || colorIcon === 5) ? MonkeyIconWhite : MonkeyIconBlack,
        nft_11_punks: '',
        nft_12_monster: '',
        nft_13_doodle: '',
        nft_14_sandbox: SandboxIcon,
        nft_15_totem: '',
        nft_16_nike: NikeIcon,
        nft_17_adidas: AdidasIcon,
        nft_18_pepsi: PepsiIcon,
        nft_19_lacoste: LacosteIcon,
        nft_20_land: LandIcon,
        nft_22_leo_1: (colorIcon === 3 || colorIcon === 5) ? LionIconWhite : LionIconBlack,
        nft_23_leo_2: (colorIcon === 3 || colorIcon === 5) ? LionIconWhite : LionIconBlack,
        nft_24_leo_3: (colorIcon === 3 || colorIcon === 5) ? LionIconWhite : LionIconBlack,
        nft_25_wb: WBIcon,
    };
}
