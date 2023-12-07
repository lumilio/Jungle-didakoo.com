const colorIdData = {
    1: {
        borderStyle: '3px solid yellow',
        backgroundBord: '#FFFF00',
        colorAddress: 'black',
        colorPower: 'black',
        avatarSrc: '../../../images/extra_objects/iconaplayB.png',
        textDecorationAddress: 'black',
        nftIconSrc: '../../../images/extra_objects/icon-59.png',
        colorId: '1'
    },
    2: {
        borderStyle: '3px solid red',
        backgroundBord: '#FF0000',
        colorAddress: 'black',
        colorPower: 'black',
        avatarSrc: '../../../images/extra_objects/iconaplayB.png',
        textDecorationAddress: 'black',
        nftIconSrc: '../../../images/extra_objects/icon-59.png',
        colorId: '2'
    },
    3: {
        borderStyle: '3px solid blue',
        backgroundBord: '#0000FF',
        colorAddress: 'white',
        colorPower: 'white',
        avatarSrc: '../../../images/extra_objects/iconaplayW.png',
        textDecorationAddress: 'white',
        nftIconSrc: '../../../images/board/animals/cat_6.png',
        colorId: '3'
    },
    4: {
        borderStyle: '3px solid #EE5E81',
        backgroundBord: '#ee5e81',
        colorAddress: 'black',
        colorPower: 'black',
        avatarSrc: '../../../images/extra_objects/iconaplayB.png',
        textDecorationAddress: 'black',
        nftIconSrc: '../../../images/extra_objects/icon-59.png',
        colorId: '4'
    },
    5: {
        borderStyle: 'black',
        backgroundBord: 'black',
        colorAddress: 'white',
        colorPower: 'white',
        avatarSrc: '../../../images/extra_objects/iconaplayW.png',
        textDecorationAddress: 'white',
        nftIconSrc: '../../../images/board/animals/cat_6.png',
        colorId: '5'
    },
    6:   {
        borderStyle: 'white',
        backgroundBord: 'white',
        colorAddress: 'black',
        colorPower: 'black',
        avatarSrc: '../../../images/extra_objects/iconaplayB.png',
        textDecorationAddress: 'black',
        nftIconSrc: '../../../images/extra_objects/icon-59.png',
        colorId: '6'
    },
}

export function getDefinitiveColorIdFromUserData(userData) {
    let colors = []
    if (userData.nft_7_color4) {
        colors.push(4)
    }

    if (userData.nft_6_color3) {
        colors.push(3)
    }

    if (userData.nft_5_color2) {
        colors.push(2)
    }

    if (userData.nft_4_color1) {
        colors.push(1)
    }

    return colors.length
        ? colors[Math.floor(Math.random() * colors.length)]
        : 0
}

export function getColorStyles(colorId) {
    if (colorIdData[colorId]) {
        return colorIdData[colorId];
    } else {
        const randomKey = Math.round(Math.random() * 3) + 1

        return colorIdData[randomKey]
    }
}
