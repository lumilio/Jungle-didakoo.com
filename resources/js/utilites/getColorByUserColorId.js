const colorIdData = {
    1: {
        borderStyle: '3px solid yellow',
        backgroundBord: '#EDEB52',
        colorAddress: 'black',
    },
    2: {
        borderStyle: '3px solid red',
        backgroundBord: '#EE3634',
        colorAddress: 'white',
    },
    3: {
        borderStyle: '3px solid blue',
        backgroundBord: '#3C5FA1',
        colorAddress: 'white',
    },
    4: {
        borderStyle: '3px solid #EE5E81',
        backgroundBord: '#EE5E81',
        colorAddress: 'black',
    }
}
export function getColorStyles(colorId) {
    return colorIdData[colorId];
}
