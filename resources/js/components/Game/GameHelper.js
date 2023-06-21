import {
    animals,
    waterCodes,
    trapCodes,
    houseCodes,
    highGuardCodes,
    lowGuardCodes,
    trapGuards,
    protectHouseCodes,
    initialState
} from "./constants";
export default {
    getSquareCode(row, col) {
        let rowMapping = ["9", "8", "7", "6", "5", "4", "3", "2", "1"];
        let colMapping = ["A", "B", "C", "D", "E", "F", "G"];

        return colMapping[col] + rowMapping[row];
    },
    getIndexesByCode(code) {
        let rowMapping = ["9", "8", "7", "6", "5", "4", "3", "2", "1"];
        let colMapping = ["A", "B", "C", "D", "E", "F", "G"];
        return {
            rowIndex: rowMapping.indexOf(code[1]),
            colIndex: colMapping.indexOf(code[0]),
        };
    },

    /**
     * Get a square color based on given row and column index
     * @param {Number} row
     * @param {Number} col
     * @returns {String}
     */
    getSquareColor(row, col) {
        if (
            row > 2 &&
            row < 6 &&
            col !== 0 &&
            col !== 3 &&
            col !== 6
        )
            return "dark";
        else return "light";
    },

    /**
     * Get Square Position Coordinate (x,y)
     * @param row
     * @param col
     * @param option
     * @returns {{x: *, y: number}}
     */
    getSquarePosition(row, col, option = {}) {
        return {
            x: col * option.square.width + option.padding,
            y: row * option.square.height,
        };
    },

    /**
     * Get chess piece mapped by square code.
     * @param {String} squareCode
     * @returns {String} The chess piece name
     */
    getSquareContent(squareCode) {
        let contentMapping = {
            A1: "tiger",
            C9: "lion",
            B2: "cat",
            F2: "dog",
            A3: "elephant",
            C3: "monkey",
            E3: "leopard",
            G3: "mouse",

            A9: "lion",
            G9: "tiger",
            B8: "dog",
            F8: "cat",
            A7: "mouse",
            C7: "leopard",
            E7: "monkey",
            G7: "elephant",
        };
        return {
            piece:contentMapping[squareCode],
            color: parseInt(squareCode[1]) > 6 &&  squareCode !== 'C9'? 'black' : 'white'
        };
    },

    /**
     * Get knight possible moves indexes
     * @param {Number} squareRowIndex
     * @param {Number} squareColIndex
     * @returns
     */
    getKnightPossibleMoves(squareRowIndex, squareColIndex) {
        return [
            { rowIndex: squareRowIndex, colIndex: squareColIndex + 1 },
            { rowIndex: squareRowIndex, colIndex: squareColIndex - 1 },

            { rowIndex: squareRowIndex - 1, colIndex: squareColIndex },
            { rowIndex: squareRowIndex + 1, colIndex: squareColIndex },
        ];
    },

    getAnimalPowers(){
        return animals
    },
    getWaterCodes (){
        return waterCodes;
    },
    getTrapCodes() {
        return trapCodes
    },
    getHouseCodes(){
        return houseCodes
    },
    getHighGuardCodes(){
        return highGuardCodes
    },
    getLowGuardCodes(){
        return lowGuardCodes
    },
    getTrapGuards(){
        return trapGuards
    },
    getProtectHouseCodes(){
        return protectHouseCodes
    },
    getInitialState(){
        return initialState
    }
};
