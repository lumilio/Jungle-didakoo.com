const colorIdData = {
    1: {
        borderStyle: '3px solid yellow',
        backgroundBord: '#EDEB52',
        colorAddress: 'black',
        colorPower: 'black',
        avatarSrc: '../../../images/extra_objects/iconaplayB.png',
        textDecorationAddress: 'black',
    },
    2: {
        borderStyle: '3px solid red',
        backgroundBord: '#EE3634',
        colorAddress: 'black',
        colorPower: 'black',
        avatarSrc: '../../../images/extra_objects/iconaplayB.png',
        textDecorationAddress: 'black',
    },
    3: {
        borderStyle: '3px solid blue',
        backgroundBord: '#3C5FA1',
        colorAddress: 'white',
        colorPower: 'white',
        avatarSrc: '../../../images/extra_objects/iconaplayW.png',
        textDecorationAddress: 'white',
    },
    4: {
        borderStyle: '3px solid #EE5E81',
        backgroundBord: '#EE5E81',
        colorAddress: 'black',
        colorPower: 'black',
        avatarSrc: '../../../images/extra_objects/iconaplayB.png',
        textDecorationAddress: 'black',
    }
}

export function getDefinitiveColorIdFromUserData(userData) {
    if (userData.nft_7_color4) {
        return 4
    } else if (userData.nft_6_color3) {
        return 3
    } else if (userData.nft_5_color2) {
        return 2
    } else if (userData.nft_4_color1) {
        return 1
    } else {
        return userData.color_id
    }
}

export function getColorStyles(colorId) {
    if (colorIdData[colorId]) {
        return colorIdData[colorId];
    } else {
        return {}
    }
}
