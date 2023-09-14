const colorIdData = {
    1: {
        borderStyle: '3px solid yellow',
        backgroundBord: '#EDEB52',
        colorAddress: 'black',
        colorPower: 'black',
        avatarSrc: '../../../images/extra_objects/iconaplayB.png',
        textDecorationAddress: 'underline black',
    },
    2: {
        borderStyle: '3px solid red',
        backgroundBord: '#EE3634',
        colorAddress: 'white',
        colorPower: 'black',
        avatarSrc: '../../../images/extra_objects/iconaplayB.png',
        textDecorationAddress: 'underline white',
    },
    3: {
        borderStyle: '3px solid blue',
        backgroundBord: '#3C5FA1',
        colorAddress: 'white',
        colorPower: 'white',
        avatarSrc: '../../../images/extra_objects/iconaplayW.png',
        textDecorationAddress: 'underline white',
    },
    4: {
        borderStyle: '3px solid #EE5E81',
        backgroundBord: '#EE5E81',
        colorAddress: 'black',
        colorPower: 'black',
        avatarSrc: '../../../images/extra_objects/iconaplayB.png',
        textDecorationAddress: 'underline black',
    }
}
export function getColorStyles(colorId) {
    if(colorIdData[colorId]){
        return colorIdData[colorId];
    } else{
        return {}
    }
}
