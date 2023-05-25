<template>
    <div style="width: 100%">
        <!-- <div class="allineatore2">
    <div class="allineatore d-flex justify-content-center align-items-center">
      <div class="container-sm board bg-black d-flex justify-content-center align-items-center"> -->
        <svg
            style="background-color: #feb442"
            ref="svg"
            :viewBox="`0 0 ${viewBox.x} ${viewBox.y}`"
        >
            <!-- <rect x="0" y="0" :width="viewBox.x" :height="viewBox.y" :fill="boardSettings.baseColor"></rect> -->
            <g>
                <River
                    :x="boardSettings.padding + boardSettings.square.width"
                    :y="boardSettings.square.height * 3"
                    :width="boardSettings.square.width * 2"
                    :height="boardSettings.square.height * 3"
                />
            </g>
            <g>
                <River
                    :x="boardSettings.padding + boardSettings.square.width * 4"
                    :y="boardSettings.square.height * 3"
                    :width="boardSettings.square.width * 2"
                    :height="boardSettings.square.height * 3"
                />
            </g>
            <g class="squares">
                <g
                    v-for="(squareRow, squareRowIndex) in squares"
                    :key="squareRowIndex"
                    class="square-row"
                >
                    <g
                        v-for="(square, squareColIndex) in squareRow"
                        :key="square.code"
                        :ref="square.code"
                        :class="{
                            square: true,
                            [`square-${square.code}`]: true,
                        }"
                        @click="
                            squareClick($event, squareRowIndex, squareColIndex)
                        "
                    >
                        <rect
                            :x="square.x"
                            :y="square.y"
                            :width="square.width"
                            :height="square.height"
                            :fill="
                                square.isPossibleMove
                                    ? possibleMoveColor(square.code)
                                    : color[square.color]
                            "
                        ></rect>
                        <rect
                            v-show="square.isPossibleMove"
                            :x="square.x + square.width / 2 - 5"
                            :y="square.y + square.height / 2 - 5"
                            width="10"
                            height="10"
                            rx="50"
                            fill="#ffffff"
                        />
                    </g>
                </g>
            </g>
            <g>
                <Den1
                    :x="boardSettings.padding + boardSettings.square.width * 3"
                    :y="0"
                    :width="boardSettings.square.width"
                    :height="boardSettings.square.height"
                />
            </g>
            <g>
                <Den2
                    :x="boardSettings.padding + boardSettings.square.width * 3"
                    :y="boardSettings.square.height * 8"
                    :width="boardSettings.square.width"
                    :height="boardSettings.square.height"
                />
            </g>
            <g>
                <Trap
                    :x="boardSettings.padding + boardSettings.square.width * 2"
                    :y="0"
                    :width="boardSettings.square.width"
                    :height="boardSettings.square.height"
                />
            </g>
            <g>
                <Trap
                    :x="boardSettings.padding + boardSettings.square.width * 4"
                    :y="0"
                    :width="boardSettings.square.width"
                    :height="boardSettings.square.height"
                />
            </g>
            <g>
                <Trap
                    :x="boardSettings.padding + boardSettings.square.width * 3"
                    :y="boardSettings.square.height"
                    :width="boardSettings.square.width"
                    :height="boardSettings.square.height"
                />
            </g>
            <g>
                <Trap
                    :x="boardSettings.padding + boardSettings.square.width * 2"
                    :y="boardSettings.square.height * 8"
                    :width="boardSettings.square.width"
                    :height="boardSettings.square.height"
                />
            </g>
            <g>
                <Trap
                    :x="boardSettings.padding + boardSettings.square.width * 4"
                    :y="boardSettings.square.height * 8"
                    :width="boardSettings.square.width"
                    :height="boardSettings.square.height"
                />
            </g>
            <g>
                <Trap
                    :x="boardSettings.padding + boardSettings.square.width * 3"
                    :y="boardSettings.square.height * 7"
                    :width="boardSettings.square.width"
                    :height="boardSettings.square.height"
                />
            </g>
            <g class="squares">
                <g
                    v-for="(squareRow, squareRowIndex) in squares"
                    :key="squareRowIndex"
                    class="square-row"
                >
                    <g
                        v-for="(square, squareColIndex) in squareRow"
                        :key="square.code"
                        :ref="square.code"
                        :class="{
                            square: true,
                            [`square-${square.code}`]: true,
                        }"
                        @click="
                            squareClick($event, squareRowIndex, squareColIndex)
                        "
                    >
                        <g v-if="square.content.piece">
                            <Piece
                                :key="square.code"
                                :name="square.content.piece"
                                :x="square.content.x"
                                :y="square.content.y + 10"
                                :transformX="gamePieceMoveCoords.toX"
                                :transformY="gamePieceMoveCoords.toY"
                                :isMoves="
                                    square.content.piece ===
                                        gamePieceMoveCoords.piece &&
                                    square.content.color ===
                                        gamePieceMoveCoords.color
                                "
                                :width="square.content.width"
                                :height="square.content.height"
                                :color="square.content.color"
                            />
                        </g>
                    </g>
                </g>
            </g>
        </svg>
        <!-- <img class='profile_cover' src="images/concepts/zzz.png" alt=""> -->
        <!-- </div>
    </div>   -->
    </div>
</template>

<script>
import { mapState } from "vuex";
import { computed, ref } from "vue";
import store from "../../store";
import helper from "./GameHelper";
import Piece from "./Elements/Piece";
import River from "./Elements/River";
import Den1 from "./Elements/Den1";
import Den2 from "./Elements/Den2";
import Trap from "./Elements/Trap";
const animals = {
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
};

const waterCodes = [
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
];
const trapCodes = ["C9", "D8", "E9", "C1", "D2", "E1"];
const domCodes = ["D9", "D1"];
const nearRiverCodes = [
    "B7",
    "C7",
    "E7",
    "F7",
    "A6",
    "D6",
    "G6",
    "A5",
    "D5",
    "G5",
    "A4",
    "D4",
    "G4",
    "B3",
    "C3",
    "E3",
    "F3",
];
export default {
    name: "Game",
    components: {
        Piece,
        River,
        Den1,
        Den2,
        Trap,
    },
    props: {
        boardSettings: {
            required: false,
            type: Object,
            default: () => ({
                padding: 0,
                showNotation: true,
                baseColor: "#000000",
                square: {
                    width: 80,
                    height: 80,
                },
            }),
        },
        color: {
            type: Object,
            default: () => ({
                light: "#feb442",
                dark: "#55555500",
                possibleMove: "#FFE194",
                possibleMoveWater: "#00e4ffa3",
                possibleStroke: "#b59f67",
            }),
        },
    },
    mounted() {
        this.initSquares();
    },
    computed: {
        turn: {
            get: function () {
                return store.state.turn;
            },
            set: function (val) {
                return store.commit("CHANGE_TURN", val);
            },
        },
    },
    data() {
        return {
            viewBox: { x: 560, y: 720 },
            counterStrike: 0,
            mouseLocation: ref({ x: 0, y: 0 }),
            squares: ref([]),
            turnNumber: ref(1),
            possibleMoves: ref([]),
            gamePieceMoveCoords: {
                piece: null,
                toX: 0,
                toY: 0,
                color: "",
            },
            svg: ref(null),
            piecepower: {
                mouse: 0,
                cat: 1,
                monkey: 2,
                dog: 3,
                leopard: 4,
                tiger: 5,
                lion: 6,
                elephant: 7,
            },
            winPos: {
                black: "D9",
                white: "D1",
            },
            isHoldingChessPiece: ref(false),
            holding: ref({ row: null, col: null }),
        };
    },
    methods: {
        possibleMoveColor(code) {
            return waterCodes.includes(code)
                ? this.color.possibleMoveWater
                : this.color.possibleMove;
        },
        squareTypeInfo(code) {
            // getting info about the square
            if (!code) return null;
            if (waterCodes.includes(code)) {
                return {
                    type: "water",
                    position: waterCodes.indexOf(code) < 6 ? "left" : "right",
                };
            }
            if (trapCodes.includes(code)) {
                return {
                    type: "trap",
                    position: trapCodes.indexOf(code) < 3 ? "black" : "white",
                };
            }
            if (domCodes.includes(code)) {
                return {
                    type: "dom",
                    position: code === "D9" ? "black" : "white",
                };
            }
            return {
                type: "land",
            };
        },
        outOfBoard(x, y) {
            // checking if coordinates are out of board
            return y < 0 || x < 0 || y > 8 || x > 6;
        },
        getLandingPosition(animalX, animalY, landingX, landingY) {
            // getting position of square if animal wants to jump over the river
            if (animalX === landingX) {
                if (landingY > animalY) {
                    return {
                        x: landingX,
                        y: landingY + 3,
                    };
                } else {
                    return {
                        x: landingX,
                        y: landingY - 3,
                    };
                }
            } else {
                if (landingX > animalX) {
                    return {
                        x: landingX + 2,
                        y: landingY,
                    };
                } else {
                    return {
                        x: landingX - 2,
                        y: landingY,
                    };
                }
            }
        },
        canBeatAnimal(animal, attacker) {
            // checking if one animal can beat another
            return (
                attacker.color !== animal.color &&
                (attacker.power >= animal.power ||
                    attacker.specialPower?.canBeat?.includes(attacker))
            );
        },
        getAnimalByCode(x, y) {
            // getting animal info with square coordinates
            let square = this.squares[y][x];
            if (square.content?.piece) {
                return {
                    animal: square.content.piece,
                    color: square.content.color,
                };
            }
            return null;
        },
        canJump(animal, directory) {
            // checking if an animal can jump by given direction
            return (
                animal.specialPower?.canJumpOverTheRiver &&
                animal.specialPower?.jumpDirections?.includes(directory)
            );
        },
        initSquares() {
            console.log(this.boardSettings, "this.boardSettings");
            for (let i = 0; i < 9; i++) {
                this.squares.push([]);
                for (let j = 0; j < 7; j++) {
                    let squarePosition = helper.getSquarePosition(
                        i,
                        j,
                        this.boardSettings
                    );
                    let code = helper.getSquareCode(i, j);
                    let squareContent = helper.getSquareContent(code);
                    let pieceSize = {
                        width: this.boardSettings.square.width,
                        height: this.boardSettings.square.height,
                    };

                    this.squares[i].push({
                        isPossibleMove: false,
                        code,
                        i,
                        j,
                        visible: true,
                        color: helper.getSquareColor(i, j),
                        content: {
                            stepNumber: 1,
                            color: i < 3 ? "black" : i > 5 ? "white" : null,
                            piece: squareContent,
                            ...squarePosition,
                            ...pieceSize,
                        },
                        ...squarePosition,
                        ...this.boardSettings.square,
                    });
                }
            }
            console.log('this.squares', this.squares)
        },


        squareClick($event, rowIndex, colIndex) {
            let square = this.squares[rowIndex][colIndex];
            if (!this.releasePiece(square)) {
                if (square.content.color === "white") {
                    this.showPossibleMoves(rowIndex, colIndex);
                    this.holding.row = rowIndex;
                    this.holding.col = colIndex;
                    this.holdPiece($event, square);
                }
            }
        },
        makeMove(fromSquare, toSquare){
            console.log( 'makeMove')
            this.gamePieceMoveCoords = {
                piece: fromSquare.content?.piece,
                toX: toSquare.x - fromSquare.x,
                toY: toSquare.y - fromSquare.y,
                color: this.turn,
            };
            toSquare.content.piece = fromSquare.content?.piece;
            toSquare.content.color = fromSquare.content?.color;
            toSquare.content.stepNumber++;
            toSquare.visible = true;
            fromSquare.content.piece = null;
            fromSquare.content.color = null;
        },
        releasePiece(toSquare) {
            if (!this.isHoldingChessPiece) return false;
            let fromSquare = this.squares[this.holding.row][this.holding.col];
            if (!toSquare.isPossibleMove) {
                this.isHoldingChessPiece = null;
                fromSquare.visible = true;
                this.clearPossibleMoves();
                return false;
            }
            this.isCheckmate(toSquare);
            this.makeMove(fromSquare,toSquare)
            this.isHoldingChessPiece = false;

            this.turnNumber++;

            this.clearPossibleMoves();

            this.turn = this.getOpponentColor(this.turn)
            setTimeout(() => {
                this.playComputer();
            }, 500);
            return true;
        },

        playAgain() {
            this.initSquares();
            this.turn = "white";
            store.commit("RESET_MOVES_HISTORY");
        },
        playComputer() {
            let move = this.calculateBestMove([...this.squares],this.turn,2)
            const { fromRow, fromCol, toRow, toCol } = move;
            const fromSquare = this.squares[fromRow][fromCol]
            const toSquare = this.squares[toRow][toCol]
            console.log(fromRow, 'fromRow')
            console.log(fromCol, 'fromCol')
            console.log(toRow, 'toRow')
            console.log(toCol, 'toCol')
            this.makeMove(fromSquare, toSquare)
            this.turn = this.getOpponentColor(this.turn)
        },
        isCheckmate(squareTo) {
            const isFinal = () =>
                squareTo.code ===
                this.winPos[this.turn === "white" ? "black" : "white"]
                    ? this.turn
                    : null;

            let winner = null;

            if ((winner = isFinal())) {
                alert(`${winner} win!`);
            }

            if (winner) {
                let again = confirm("Want to play again?");
                if (again) this.playAgain();
            }
        },

        makeItPossible(square) {
            square.isPossibleMove = true;
            this.possibleMoves.push(square);
        },
        clearPossibleMoves() {
            for (let i = 0; i < this.possibleMoves.length; i++) {
                this.possibleMoves[i].isPossibleMove = false;
            }
            this.possibleMoves = ref([]);
        },


        /**
         * Hold a chess piece to a square
         */
        holdPiece($event, square) {
            if (
                !square.content.piece ||
                square.content.color !== this.turn ||
                this.possibleMoves.length === 0
            )
                return;
            this.isHoldingChessPiece = square;
            square.visible = false;
        },

        getPossibleMoves(squareRowIndex, squareColIndex){
            const square = this.squares[squareRowIndex][squareColIndex];
            let moveTargets = helper.getKnightPossibleMoves(
                squareRowIndex,
                squareColIndex
            );
            const currentAnimalInfo = {
                ...animals[square.content.piece],
                color: square.content?.color,
            };
            // color of current chosen animal
            const currentSquareColor = square.content?.color;
            const currentSquareType = this.squareTypeInfo(square.code);
            if (
                currentSquareType.type === "trap" &&
                currentSquareType.position !== currentSquareColor
            ) {
                currentAnimalInfo.power = 0;
            }
            const possibleMovesResult = [];
            const collectPossible = (row,col) => {
                possibleMovesResult.push({
                    fromRow: squareRowIndex,
                    fromCol: squareColIndex,
                    toRow: row,
                    toCol: col,
                })
            }
            moveTargets.forEach((target) => {
                let { rowIndex, colIndex } = target;
                // checking if possible move is out of game board
                if (this.outOfBoard(colIndex, rowIndex)) return;
                const targetSquare = this.squares[rowIndex][colIndex];
                const targetSquareInfo = this.squareTypeInfo(targetSquare.code);

                // getting the animal of target square if exists
                const targetSquareAnimal = targetSquare.content.piece
                    ? {
                        ...animals[targetSquare.content.piece],
                        color: targetSquare.content.color,
                    }
                    : null;

                // checking if target square animal is the same color as chosen animal
                if (
                    !targetSquareInfo ||
                    (targetSquareAnimal &&
                        targetSquareAnimal.color === currentSquareColor)
                ) {
                    return;
                }
                // checking different types of possible move square
                switch (targetSquareInfo.type) {
                    // the possible move square is water
                    case "water":
                        // if our animal can swim , the move is possible
                        if (currentAnimalInfo.specialPower?.canSwim) {
                            collectPossible(rowIndex,colIndex)
                            return;
                        }
                        // if our animal can jump over the river
                        // and beat the animal on the other side the move is possible
                        // To Do ---> check if water is blocked
                        else if (
                            this.canJump(
                                currentAnimalInfo,
                                squareRowIndex === rowIndex
                                    ? "vertical"
                                    : "horizontal"
                            )
                        ) {
                            let jumpingTargetCoordinates =
                                this.getLandingPosition(
                                    squareColIndex,
                                    squareRowIndex,
                                    colIndex,
                                    rowIndex
                                );
                            let possibleTargetAnimal = this.getAnimalByCode(
                                jumpingTargetCoordinates.x,
                                jumpingTargetCoordinates.y
                            );
                            if (
                                !possibleTargetAnimal ||
                                this.canBeatAnimal(
                                    {
                                        ...animals[possibleTargetAnimal.animal],
                                        color: possibleTargetAnimal.color,
                                    },
                                    currentAnimalInfo
                                )
                            ) {
                                collectPossible(jumpingTargetCoordinates.y,jumpingTargetCoordinates.x)
                                return;
                            }
                        }
                        break;
                    // the possible move square is trap
                    case "trap":
                        // if target is ours the move is possible
                        if (targetSquareInfo.position === currentSquareColor) {
                            collectPossible(rowIndex,colIndex)
                            return;
                        }
                        //else if there's no animal, or we can beat the animal the move is possible
                        else if (
                            !targetSquareAnimal ||
                            this.canBeatAnimal(
                                targetSquareAnimal,
                                currentAnimalInfo
                            )
                        ) {
                            collectPossible(rowIndex,colIndex)
                            return;
                        }
                        break;
                    // the possible move square is dom
                    case "dom":
                        // if it's the opponents dom the move is possible (even winning)
                        if (targetSquareInfo.position !== currentSquareColor) {
                            collectPossible(rowIndex,colIndex)
                            return;
                        }
                        break;
                    // the possible move square is land
                    case "land":
                        if (!targetSquareAnimal) {
                            collectPossible(rowIndex,colIndex)
                            return;
                        } else {
                            if (
                                currentSquareType.type !== "water" &&
                                this.canBeatAnimal(
                                    targetSquareAnimal,
                                    currentAnimalInfo
                                )
                            ) {
                                collectPossible(rowIndex,colIndex)
                                return;
                            }
                        }
                }
            });
            return possibleMovesResult;
        },

        showPossibleMoves(squareRowIndex, squareColIndex) {
            let moves = this.getPossibleMoves(squareRowIndex, squareColIndex);
            console.log(moves);
            moves.forEach((move) => {
                let square = this.squares[move.toRow][move.toCol]
                square.isPossibleMove = true;
                this.possibleMoves.push(square);
            })
        },
        calculateBestMove(board, color, depth) {
            let bestMove = null;
            let bestScore = -Infinity;

            const possibleMoves = this.generatePossibleMoves(board, color);

            for (let i = 0; i < possibleMoves.length; i++) {
                const move = possibleMoves[i];
                const newBoard = this.cloneBoard(board);
                this.makeVirtualMove(newBoard, move);
                const score = this.recursiveSwim(newBoard, depth - 1, -Infinity, Infinity, false, color);
                if (score > bestScore) {
                    bestScore = score;
                    bestMove = move;
                }
            }
            return bestMove;
        },
        recursiveSwim(board, depth, alpha, beta, isMaximizingPlayer, color) {
            this.counterStrike ++;
            if (depth === 0) {
                return this.evaluateBoard(board, color);
            }
            const currentPlayer = isMaximizingPlayer ? color :this.getOpponentColor(color);
            const possibleMoves = this.generatePossibleMoves(board, currentPlayer);

            if (isMaximizingPlayer) {
                let maxScore = -Infinity;
                for (let i = 0; i < possibleMoves.length; i++) {
                    const move = possibleMoves[i];
                    const newBoard = this.cloneBoard(board);
                    this.makeVirtualMove(newBoard, move);

                    const score = this.recursiveSwim(newBoard, depth - 1, alpha, beta, false, color);
                    maxScore = Math.max(maxScore, score);

                    alpha = Math.max(alpha, score);
                    if (beta <= alpha) {
                        break;
                    }
                }
                return maxScore;
            } else {
                let minScore = Infinity;
                for (let i = 0; i < possibleMoves.length; i++) {
                    const move = possibleMoves[i];
                    const newBoard = this.cloneBoard(board);
                    this.makeVirtualMove(newBoard, move);
                    const score = this.recursiveSwim(newBoard, depth - 1, alpha, beta, true, color);
                    minScore = Math.min(minScore, score);
                    beta = Math.min(beta, score);
                    if (beta <= alpha) {
                        break;
                    }
                }
                return minScore;
            }
        },
        cloneBoard(board) {
            const clonedBoard = [];
            for (let row = 0; row < 9; row++) {
                const newRow = [];
                for (let col = 0; col < 7; col++) {
                    const square = { ...board[row][col] };
                    newRow.push(square);
                }
                clonedBoard.push(newRow);
            }
            return clonedBoard;
        },
        makeVirtualMove(board, move, zzz = false) {
            const { fromRow, fromCol, toRow, toCol } = move;
            const fromSquare = board[fromRow][fromCol];
            const toSquare = board[toRow][toCol];
            if(zzz){
                console.log('fromSquare',fromSquare)
                console.log('toSquare',toSquare)
            }
            toSquare.content = fromSquare.content;
            fromSquare.content = {
                piece: null,
                color: null,
            }
        },
        evaluateBoard(board, color) {
            let score = 0;
            for (let row = 0; row < 9; row++) {
                for (let col = 0; col < 7; col++) {
                    const square = board[row][col];
                    if (square.content && square.content.color === color) {
                        const pieceValue = this.getPieceValue(square.content.piece);
                        const positionValue = this.getPositionValue(row, col, color);
                        score += pieceValue + positionValue;
                    }
                }
            }
            return score;
        },
        getPieceValue(piece) {
            return animals[piece]?.power || 0
        },
        getPositionValue(row, col, color) {
            const distanceFromHouse = color === 'black' ? 8 - row : row;
            const distanceFromCenter = Math.abs(col - 3);
            return -(distanceFromHouse + distanceFromCenter);
        },
        generatePossibleMoves(board, color) {
            const moves = [];
            for (let row = 0; row < 9; row++) {
                for (let col = 0; col < 7; col++) {
                    const square = board[row][col];
                    if (square.content && square.content.color === color) {
                        const pieceMoves = this.getPossibleMoves(row, col);
                        for (const move of pieceMoves) {
                            moves.push(move);
                        }
                    }
                }
            }
            return moves;
        },
        getOpponentColor(color) {
            return color === 'black' ? 'white' : 'black';
        }

    },
};
</script>

<style lang="scss">
.chessboard {
    padding-bottom: 97.5%;
}
.holding-piece {
    pointer-events: none;
}
.notation {
    fill: #ccc;
    font-size: 1.5rem;
}
</style>
