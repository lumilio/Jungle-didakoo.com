import { iteratee } from "lodash";

export default {
    /**
     * A function to get every square code based on array indexes
     * @param {Number} row
     * @param {Number} col
     * @returns {String}
     */
    animals: {
        mouse: {
            power: 0,
            specialPower: {
                canSwim: true,
                canBeat: ["elephant"],
            },
        },
        cat: {
            power: 1,
        },
        monkey: {
            power: 2,
        },
        dog: {
            power: 3,
        },
        leopard: {
            power: 4,
        },
        tiger: {
            power: 5,
            specialPower: {
                canJumpOverTheRiver: true,
                jumpDirections: ["vertical"],
            },
        },
        lion: {
            power: 6,
            specialPower: {
                canJumpOverTheRiver: true,
                jumpDirections: ["vertical", "horizontal"],
            },
        },
        elephant: {
            power: 7,
        },
    },
    waterCodes: [
        "B6",
        "C6",
        "B5",
        "C5",
        "B4",
        "C4",
        "E6",
        "F6",
        "E5",
        "F5",
        "E4",
        "F4",
    ],
    getSquareCode(row, col) {
        let rowMapping = ["9", "8", "7", "6", "5", "4", "3", "2", "1"];
        let colMapping = ["A", "B", "C", "D", "E", "F", "G"];

        return colMapping[col] + rowMapping[row];
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
            col != 0 &&
            col != 3 &&
            col != 6
            // ((row == 0 || row == 8) && col >= 2 && col <= 4) ||
            // ((row == 1 || row == 7) && col == 3)
        )
            return "dark";
        else return "light";
    },

    /**
     * Get Square Position Coordinate (x,y)
     * @param {Number} row square row index
     * @param {Number} col square column index
     */
    getSquarePosition(row, col, option = {}) {
        return {
            x: col * option.square.width + option.padding,
            y: row * option.square.height,
        };
    },

    isDen(i, j) {
        if (
            (i == 2 && j == 0) ||
            (i == 4 && j == 0) ||
            (i == 3 && j == 1) ||
            (i == 2 && j == 8) ||
            (i == 4 && j == 8) ||
            (i == 3 && j == 7)
        )
            return true;
        else return false;
    },

    denOwner(i, j) {
        if ((i == 2 && j == 0) || (i == 4 && j == 0) || (i == 3 && j == 1))
            return 1;
        else if ((i == 2 && j == 8) || (i == 4 && j == 8) || (i == 3 && j == 7))
            return 2;
        else return -1;
    },

    isTrap(i, j) {
        if ((i == 3 && j == 0) || (i == 3 && j == 8)) return true;
        else return false;
    },

    trapOwner(i, j) {
        if (i == 3 && j == 0) return 1;
        else if (i == 3 && j == 8) return 2;
        else return -1;
    },

    isWater(i, j) {
        if (j >= 3 && j <= 5 && (i == 1 || i == 2 || i == 4 || i == 5))
            return true;
        else return false;
    },

    /**
     * Get chess piece mapped by square code.
     * @param {String} squareCode
     * @returns {String} The chess piece name
     */
    getSquareContent(squareCode) {
        let contentMapping = {
            A1: "tiger",
            G1: "lion",
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
        return contentMapping[squareCode];
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

    /**
     * Get king possible moves mapping array
     * @param {Number} squareRowIndex The current row index number
     * @param {Number} squareColIndex The current col index number
     * @returns {Array}
     */
    getKingPossibleMoves(squareRowIndex, squareColIndex) {
        return [
            { targetRow: squareRowIndex + 1, targetCol: squareColIndex },
            { targetRow: squareRowIndex - 1, targetCol: squareColIndex },
            { targetRow: squareRowIndex, targetCol: squareColIndex + 1 },
            { targetRow: squareRowIndex, targetCol: squareColIndex - 1 },

            // diagonal
            { targetRow: squareRowIndex + 1, targetCol: squareColIndex + 1 },
            { targetRow: squareRowIndex + 1, targetCol: squareColIndex - 1 },
            { targetRow: squareRowIndex - 1, targetCol: squareColIndex + 1 },
            { targetRow: squareRowIndex - 1, targetCol: squareColIndex - 1 },
        ];
    },

    /**
     * Convert object to chess move notations
     * @param {Object} move
     * @returns String
     */
    notationsFromObject(move) {
        if (!Object.keys(move).length) return "";

        let pieceNotationMapping = {
            mouse: "1",
            cat: "2",
            dog: "3",
            monkey: "4",
            leopard: "5",
            tiger: "6",
            lion: "7",
            elephant: "8",
        };
        // console.log("piece notation: ", pieceNotationMapping[move.piece]);

        let fromKey = move.from.toLowerCase();
        let toKey = move.to.toLowerCase();

        if (fromKey[0] == toKey[0]) fromKey = fromKey.substr(1, 2);
        if (fromKey[1] == toKey[1]) fromKey = fromKey.substr(0, 1);

        return (
            pieceNotationMapping[move.piece] +
            fromKey.toLowerCase() +
            toKey.toLowerCase()
        );
    },
};
