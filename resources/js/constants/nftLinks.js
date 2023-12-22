import MonkeyIconBlack from '../../../public/images/board/animals/icon-36.png';
import MonkeyIconWhite from '../../../public/images/board/animals/icon-44.png';
import CatIconBlack from '../../../public/images/board/animals/icon-59.png';
import CatIconWhite from '../../../public/images/board/animals/icon-60.png';
import NikeIcon from '../../images/extra_objects/nike.png';
import AdidasIcon from '../../images/extra_objects/adidas.png';
import WBIcon from '../../images/extra_objects/wb.png';
import PepsiIcon from '../../images/extra_objects/pepsi.png';
import LacosteIcon from '../../images/extra_objects/coco.png';
import LandIcon from '../../images/extra_objects/palm.png';
import SandboxIcon from '../../images/extra_objects/mario.png';
import tigerIconBlack from '../../../public/images/board/animals/icon-38.png'
import tigerIconWhite from '../../../public/images/board/animals/icon-46.png'
import leopardIconBlack from '../../../public/images/board/animals/icon-37.png'
import leopardIconWhite from '../../../public/images/board/animals/icon-45.png'
import LionIconBlack from '../../../public/images/board/animals/icon-39.png';
import LionIconWhite from '../../../public/images/board/animals/icon-47.png';

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
        nft_22_leo_1: (colorIcon === 3 || colorIcon === 5) ? leopardIconWhite : leopardIconBlack,
        nft_23_leo_2: (colorIcon === 3 || colorIcon === 5) ? tigerIconWhite : tigerIconBlack,
        nft_24_leo_3: (colorIcon === 3 || colorIcon === 5) ? LionIconWhite : LionIconBlack,
        nft_25_wb: WBIcon,
    };
}
