<template>
  <div style="width: 100%;">
  <!-- <div class="allineatore2">
    <div class="allineatore d-flex justify-content-center align-items-center">
      <div class="container-sm board bg-black d-flex justify-content-center align-items-center"> -->
        <svg style="background-color: #feb442;" ref="svg" :viewBox="`0 0 ${viewBox.x} ${viewBox.y}`" @mousemove="onMouseMove">
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
                :class="{ square: true, [`square-${square.code}`]: true }"
                @click="squareClick($event, squareRowIndex, squareColIndex)"
              >
                <rect
                  :x="square.x"
                  :y="square.y"
                  :width="square.width"
                  :height="square.height"
                  :fill="
                    square.isPossibleMove
                      ? possibleMoveColor(squareColIndex,squareRowIndex)
                      : color[square.color]
                  "
                >
                </rect>
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
                :class="{ square: true, [`square-${square.code}`]: true }"
                @click="squareClick($event, squareRowIndex, squareColIndex)"

              >
                <g v-if="square.content.piece">
                  <Piece
                    :key="square.code"
                    :name="square.content.piece"
                    :x="square.content.x"
                    :y="square.content.y + 10"
                    :transformX="gamePieceMoveCoords.toX"
                    :transformY="gamePieceMoveCoords.toY"
                    :isMoves="square.content.piece === gamePieceMoveCoords.piece && square.content.color === gamePieceMoveCoords.color"
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
  import { mapState } from 'vuex';
  import { computed, ref } from "vue";
  import store from "../../store";
  import helper from "./GameHelper";
  import Piece from "./Elements/Piece";
  import River from "./Elements/River";
  import Den1 from "./Elements/Den1";
  import Den2 from "./Elements/Den2";
  import Trap from "./Elements/Trap";
  const waterCoordinates = [
      '1_3',
      '2_3',
      '1_4',
      '2_4',
      '1_5',
      '2_5',
      '4_3',
      '5_3',
      '4_4',
      '5_4',
      '4_5',
      '5_5',
  ]
  export default {
    name: "Game",
    components: {
      Piece,
      River,
      Den1,
      Den2,
      Trap
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
        get: function() {
            return store.state.turn;
        },
        set: function(val) {
          return store.commit("CHANGE_TURN", val);
        }
      },
    },
    data() {
      return {
        viewBox: {x: 560, y: 720},
        mouseLocation: ref({ x: 0, y: 0 }),
        squares: ref([]),
        turnNumber: ref(1),
        possibleMoves: ref([]),
        gamePieceMoveCoords: {
            piece: null,
            toX: 0,
            toY: 0,
            color: ''
        },
        svg: ref(null),
        piecepower: {
          mouse : 0,
          cat   : 1,
          monkey : 2,
          dog   : 3,
          leopard : 4,
          tiger : 5,
          lion  : 6,
          elephant : 7
        },
        winPos: {
          black: "D9",
          white: "D1"
        },
        isHoldingChessPiece: ref(false),
        holding: ref({ row: null, col: null }),
      }
    },
    methods: {
        possibleMoveColor(x,y){
            return waterCoordinates.includes(x + '_' + y) ? this.color.possibleMoveWater : this.color.possibleMove
        },
      onMouseMove(e) {
        // let rect = this.svg.value.getBoundingClientRect();
        // this.mouseLocation.x = ((e.clientX - rect.x) * this.viewBox.x) / rect.width;
        // this.mouseLocation.y = ((e.clientY - rect.y) * this.viewBox.y) / rect.height;
      },
      initSquares() {
        for (let i = 0; i < 9; i++) {
          this.squares.push([]);
          for (let j = 0; j < 7; j++) {
            let squarePosition = helper.getSquarePosition(i, j, this.boardSettings);
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
      },

      /**
       * Event fire on square click
       * @returns {void}
       */
      squareClick($event, rowIndex, colIndex) {
        let square = this.squares[rowIndex][colIndex];
        if (this.isHoldingChessPiece) {
          // If user is holding a chess piece, then release it.
          this.releasePiece($event, square);
        } else {
            this.showPossibleMoves(rowIndex, colIndex)
          // If user is holding not holding chess piece, then hold it.
          this.holding.row = rowIndex;
          this.holding.col = colIndex;
          this.holdPiece($event, square);
        }
      },

      /**
       * Release a chess piece to a square
       * @returns {void}
       */
      releasePiece($event, toSquare) {
        let fromSquare = this.squares[this.holding.row][this.holding.col];
          if (!toSquare.isPossibleMove) {
          this.isHoldingChessPiece = null;
          fromSquare.visible = true;
          return this.clearPossibleMoves();
        }
        this.isCheckmate(toSquare);
        this.gamePieceMoveCoords = {
            piece: fromSquare.content.piece,
            toX: toSquare.x - fromSquare.x,
            toY: toSquare.y - fromSquare.y,
            color: 'white'
        }
        toSquare.content.piece = fromSquare.content.piece;
        toSquare.content.color = fromSquare.content.color;
        toSquare.content.stepNumber++;
        toSquare.visible = true;
        fromSquare.content.piece = null;
        fromSquare.content.color = null;

        this.isHoldingChessPiece = false;

        this.turnNumber++;

        this.clearPossibleMoves();

        this.turn = this.turn == "black" ? "white" : "black";
        setTimeout(() => {
            this.playComputer();
        },350);
      },

      playAgain() {
        this.initSquares();
        this.turn = "white";
        store.commit("RESET_MOVES_HISTORY");
      },

      isCheckmate(squareTo) {
        const isFinal = () =>
          squareTo.code == this.winPos[this.turn == 'white' ? 'black' : 'white'] ? this.turn: null;

        let winner = null;

        if ((winner = isFinal())) {
          alert(`${winner} win!`);
        }

        if (winner) {
          let again = confirm("Want to play again?");
          if (again) this.playAgain();
        }
      },

      playComputer() {
        let minv = -200000000, maxv = 200000000;

        let clone = [];
        for(let i = 0; i < 9; i++)
        {
          clone.push([]);
          for(let j = 0; j < 7;j++)
          {
            clone[i][j] = Object.assign({}, this.squares[i][j]);
            clone[i][j].content = Object.assign({}, this.squares[i][j].content);
          }
        }

        let move = {
          currentBoard: clone,
          nextMove: null
        }
        let m = this.minimax(clone, 3, "black", move, minv, maxv)
        let t = m.last_move;

        while (t.nextMove.nextMove != null)
        {
          if (t.nextMove != null)
          {
            t = t.nextMove;
          }
          else
          {
            break;
          }
        }


        if (t != null)
        {
          let fromSquare, toSquare;
          let flag = true;
          for(let i = 0; i < 9; i++)
          {
            for (let j = 0; j < 7; j++) {
              if(this.squares[i][j].content.piece && !t.currentBoard[i][j].content.piece)
              {
                fromSquare = this.squares[i][j];
                if(i < 8 && (this.squares[i + 1][j].content.piece != t.currentBoard[i + 1][j].content.piece || (this.squares[i + 1][j].content.piece == t.currentBoard[i + 1][j].content.piece && this.squares[i + 1][j].content.color != t.currentBoard[i + 1][j].content.color) ))
                {
                  toSquare = this.squares[i + 1][j];
                  flag = false;
                  break;
                }
                if(i > 0 && (this.squares[i - 1][j].content.piece != t.currentBoard[i - 1][j].content.piece || (this.squares[i - 1][j].content.piece == t.currentBoard[i - 1][j].content.piece && this.squares[i - 1][j].content.color != t.currentBoard[i - 1][j].content.color)))
                {
                  toSquare = this.squares[i - 1][j];
                  flag = false;
                  break;
                }
                if(j < 6 && (this.squares[i][j + 1].content.piece != t.currentBoard[i][j + 1].content.piece || (this.squares[i][j + 1].content.piece == t.currentBoard[i][j + 1].content.piece && this.squares[i][j + 1].content.color != t.currentBoard[i][j + 1].content.color)))
                {
                  toSquare = this.squares[i][j + 1];
                  flag = false;
                  break;
                }
                if(j > 0 && (this.squares[i][j - 1].content.piece != t.currentBoard[i][j - 1].content.piece || (this.squares[i][j - 1].content.piece == t.currentBoard[i][j - 1].content.piece && this.squares[i][j - 1].content.color != t.currentBoard[i][j - 1].content.color)))
                {
                  toSquare = this.squares[i][j - 1];
                  flag = false;
                  break;
                }
              }
            }
            if (flag == false)
              break;
          }
          this.isCheckmate(toSquare);
            this.gamePieceMoveCoords = {
                piece: fromSquare.content.piece,
                toX: toSquare.x - fromSquare.x,
                toY: toSquare.y - fromSquare.y,
                color: 'black'
            }
          toSquare.content.piece = fromSquare.content.piece;
          toSquare.content.color = fromSquare.content.color;
          toSquare.content.stepNumber++;
          toSquare.visible = true;
          fromSquare.content.piece = null;
          fromSquare.content.color = null;
          this.turnNumber++;
          this.turn = this.turn == "black" ? "white" : "black";
        }
      },

      minimax(board, depth, giliran_now, last_move, alpha, beta){
        if (depth == 0) {
          let value = 0;
          let copy = last_move.currentBoard;
          let myPieces = [];
          let enemyPieces = [];

          for (let i = 0; i < 9; i++) {
            for (let j = 0; j < 7; j++) {
              let currentPiece = copy[i][j];
              if(currentPiece.content.piece && currentPiece.content.color == "black")
                myPieces.push(currentPiece);
              else
                if(currentPiece.content.piece && currentPiece.content.color != "black")
                  enemyPieces.push(currentPiece);
            }
          }

          value += ((myPieces.length - enemyPieces.length) * 100);
          let jarakX = -200000000, jarakY = -200000000;
          let dx = 200000000, dy = 200000000;

          myPieces.forEach(item => {
            jarakX = 3 - item.j;
            jarakX = Math.abs(jarakX);
            value += this.getShaktiValue(this.piecepower[item.content.piece], item.i, item.j);
            jarakY = Math.abs(8 - item.i);
            if (jarakY == jarakX && jarakX == 0)
            {
                value = 200000000;
                return {
                    last_move,
                    value
                };
            }
            else
            {
                if (dx > jarakX) dx = jarakX;
                if (dy > jarakY) dy = jarakY;
            }
          });

          value += (((jarakX + jarakY) / 2) * -1);
          return {
            last_move,
            value
          };
        }
        else {
          let willMove = [];
          let ctr = 0;

          for(let y = 0; y < 9; y++)
          {
            for (let x = 0; x < 7; x++)
            {
              let node = board[y][x];
              if(node.content.piece)
              {
                if(node.content.color == giliran_now)
                {
                  willMove.push(node);
                  ++ctr;
                }
              }
            }
          }

          let boards = [];

          willMove.forEach(squ => {
            let possibMoves = this.getPossibleMoves(squ.i, squ.j, board);
            possibMoves.forEach(move => {
              let temp = [];
              for(let i = 0; i < 9; i++)
              {
                temp.push([]);
                for(let j = 0; j < 7;j++)
                {
                  temp[i][j] = Object.assign({}, board[i][j]);
                  temp[i][j].content = Object.assign({}, board[i][j].content);
                }
              }
              temp[move.i][move.j].content.color = squ.content.color;
              temp[move.i][move.j].content.piece = squ.content.piece;
              temp[squ.i][squ.j].content.color = null;
              temp[squ.i][squ.j].content.piece = null;
              boards.push(temp);
            });
          });

          let kembalian = [];
          for (const k in boards) {
            let item = boards[k];
            let clonedBoard = [];
            for(let i = 0; i < 9; i++)
            {
              clonedBoard.push([]);
              for(let j = 0; j < 7;j++)
              {
                clonedBoard[i][j] = Object.assign({}, item[i][j]);
                clonedBoard[i][j].content = Object.assign({}, item[i][j].content);
              }
            }
            let now = {
              currentBoard: clonedBoard,
              nextMove: last_move
            }

            let tampung = this.minimax(clonedBoard, depth - 1, giliran_now == "black" ? "white" : "black", now, alpha, beta);

            if(kembalian.length == 0)
            {
              kembalian = tampung;
            }

            if(giliran_now == "black")
            {
                // get Max
                if(alpha < tampung.value)
                {
                    // swap
                    alpha = tampung.value;
                    kembalian = tampung;
                }
            }
            else
            {
                // get Min
                if(beta > tampung.value)
                {
                    beta = tampung.value;
                    kembalian = tampung;
                }
            }

            // PRUNE
            if(alpha >= beta)
            {
              break;
            }
          }

          return kembalian;
        }
      },

      getShaktiValue(str, i, j)
      {
        const mouse_magic_number = [
          [ 8, 8, 8, 0, 8, 8, 8 ],
          [ 8, 8, 8, 9, 9, 9, 9 ],
          [ 8, 8, 8, 9, 10, 10, 10 ],
          [ 8, 9, 9, 10, 12, 12, 11],
          [ 8, 9, 9, 11, 12, 12, 12 ],
          [ 8, 9, 9, 11, 12, 12, 13 ],
          [ 10, 11, 11, 13, 13, 13, 13 ],
          [ 11, 12, 13, 50, 13, 13, 13 ],
          [ 11, 13, 50, 200000000, 50,13,13 ]
        ]

        const cat_magic_number = [
          [ 8, 8, 8, 0, 8, 8, 8 ],
          [ 13, 10, 8, 8, 8, 8, 8 ],
          [ 10, 10, 10, 8, 8, 8, 8 ],
          [ 10, 0, 0, 8, 0, 0, 8 ],
          [ 10, 0, 0, 8, 0, 0, 8 ],
          [ 10, 0, 0, 10, 0, 0, 8 ],
          [ 10, 11, 11, 15, 11, 11, 10 ],
          [ 11, 11, 15, 50, 15, 11, 11 ],
          [ 11, 15, 50, 200000000, 50, 15, 11]
        ];

        const monkey_magic_number = [
            [8, 12, 12, 0, 8, 8, 8],
            [8, 12, 13, 8, 8, 8, 8],
            [8, 8, 10, 8, 8, 8, 8],
            [8, 0, 0, 8, 0, 0, 8],
            [8, 0, 0, 8, 0, 0, 8],
            [9, 0, 0, 10, 0, 0, 9],
            [9, 10, 11, 15, 11, 10, 9],
            [10, 11, 15, 50, 15, 11, 10],
            [11, 15, 50, 200000000, 50, 15, 11]
        ];

        const dog_magic_number = [
            [8, 8, 8, 0, 12, 12, 8],
            [8, 8, 8, 8, 13, 10, 8],
            [8, 8, 8, 8, 8, 8, 8],
            [8, 0, 0, 8, 0, 0, 8],
            [8, 0, 0, 8, 0, 0, 8],
            [9, 0, 0, 10, 0, 0, 9],
            [9, 10, 11, 15, 11, 10, 9],
            [10, 11, 15, 50, 15, 11, 10],
            [11, 15, 50, 200000000, 50, 15, 11]
        ];

        const leopard_magic_number = [
            [9, 9, 9, 0, 9, 9, 9],
            [9, 9, 9, 9, 9, 9, 9],
            [9, 9, 9, 10, 10, 9, 9],
            [10, 0, 0, 13, 0, 0, 10],
            [11, 0, 0, 14, 0, 0, 11],
            [12, 0, 0, 15, 0, 0, 12],
            [13, 13, 14, 15, 14, 13, 13],
            [13, 14, 15, 50, 15, 14, 13],
            [14, 15, 50, 200000000, 50, 15, 14]
        ];

        const tiger_magic_number = [
            [10, 12, 12, 0, 12, 12, 10],
            [12, 14, 12, 12, 12, 12, 12],
            [14, 16, 16, 14, 16, 16, 14],
            [15, 0, 0, 15, 0, 0, 15],
            [15, 0, 0, 15, 0, 0, 15],
            [15, 0, 0, 15, 0, 0, 15],
            [18, 20, 20, 30, 20, 20, 18],
            [25, 25, 30, 50, 30, 25, 25],
            [25, 30, 50, 200000000, 50, 30, 25]
        ];

        const lion_magic_number = [
            [10, 12, 12, 0, 12, 12, 10],
            [12, 12, 12, 12, 12, 14, 12],
            [14, 16, 16, 14, 16, 16, 14],
            [15, 0, 0, 15, 0, 0, 15],
            [15, 0, 0, 15, 0, 0, 15],
            [15, 0, 0, 15, 0, 0, 15],
            [18, 20, 20, 30, 20, 20, 18],
            [25, 25, 30, 50, 30, 25, 25],
            [25, 30, 50, 200000000, 50, 30, 25]

        ];

        const elephant_magic_number = [
            [11, 11, 11, 0, 11, 11, 11],
            [11, 11, 11, 11, 11, 11, 11],
            [10, 15, 14, 14, 14, 14, 12],
            [12, 0, 0, 12, 0, 0, 12],
            [14, 0, 0, 14, 0, 0, 14],
            [16, 0, 0, 16, 0, 0, 16],
            [18, 20, 20, 30, 20, 20, 18],
            [25, 25, 30, 50, 30, 25, 25],
            [25, 30, 50, 200000000, 50, 30, 25]
        ];

        const magic_numbers = [
            mouse_magic_number,
            cat_magic_number,
            monkey_magic_number,
            dog_magic_number,
            leopard_magic_number,
            tiger_magic_number,
            lion_magic_number,
            elephant_magic_number
        ];

        try
        {
            return magic_numbers[str][i][j];
        }
        catch
        {
            return 0;
        }
      },

      /**
       * Get possible moves from a square
       * @param {Object} square
       * @returns {void}
       */
      getPossibleMoves(squareRowIndex, squareColIndex, board) {
        /*eslint no-unused-vars: "off"*/
        let square = board[squareRowIndex][squareColIndex];
        return this.getPossMoves(square, squareRowIndex, squareColIndex, board);
      },

      /**
       * Show knight's possible moves by row and column index
       * @param {Number} squareRowIndex
       * @param {Number} squareColIndex
       * @returns {void}
       */
      getPossMoves(square, squareRowIndex, squareColIndex, board) {
        let moveTargets = helper.getKnightPossibleMoves(
          squareRowIndex,
          squareColIndex
        );
        let temp = [];
        for (const key in moveTargets) {
          let target = moveTargets[key];

          let { rowIndex, colIndex } = target;

          if (square.content.piece == "mouse" || square.content.piece == "tiger" || square.content.piece == "lion")
          {
            if (rowIndex < 0 || colIndex < 0 || rowIndex > 8 || colIndex > 6)
              continue;
          }
          else
            if (rowIndex < 0 || colIndex < 0 || rowIndex > 8 || colIndex > 6 || (rowIndex > 2 && rowIndex < 6) && (colIndex != 0 && colIndex != 3 && colIndex != 6))
              continue;

          let targetSquare = board[rowIndex][colIndex];

          // trap
          if (this.turn == 'white' && (targetSquare.code == 'E1' || targetSquare.code == 'C1' || targetSquare.code == 'D2'))
          {
            if (targetSquare.content.color == 'black')
            {
              temp.push(targetSquare);
              continue;
            }
            continue;
          }
          if (this.turn == 'black' && (targetSquare.code == 'E9' || targetSquare.code == 'C9' || targetSquare.code == 'D8'))
          {
            if (targetSquare.content.color == 'white')
            {
              temp.push(targetSquare);
              continue;
            }
            continue;
          }

          // tiger and lion can jump over the water
          if ((square.content.piece == "tiger" || square.content.piece == "lion") && targetSquare.color == "dark")
          {
            if (squareColIndex == colIndex)
            {
              for (let i = 3; i < 6; i++) {
                const squ = board[i][colIndex];
                if (squ.content.piece)
                  continue;
              }
              rowIndex = 8 - squareRowIndex;
            }
            else
            {
              if (squareColIndex != 3)
                colIndex = 3;
              else
                colIndex = squareColIndex + (colIndex - squareColIndex) * 3;
              if (colIndex > squareColIndex)
                for (let i = squareColIndex + 1; i < colIndex; i++) {
                  const squ = board[rowIndex][i];
                  if (squ.content.piece)
                    continue;
                }
              else
                for (let i = colIndex + 1; i < squareColIndex; i++) {
                  const squ = board[rowIndex][i];
                  if (squ.content.piece)
                    continue;
                }
            }
            targetSquare = board[rowIndex][colIndex];
          }
          else
          {
            // mouse can move through the water
            if (square.content.piece == "mouse")
            {
              if (targetSquare.content.piece && targetSquare.content.color != this.turn && (6 >= this.piecepower[targetSquare.content.piece] && 0 < this.piecepower[targetSquare.content.piece]))
                continue;
              if (targetSquare.content.piece && square.color == "dark" && targetSquare.color == "light")
                continue;
            }
            else
            {
              if (square.content.piece == "elephant")
              {
                if (targetSquare.content.piece && targetSquare.content.color != this.turn && this.piecepower[targetSquare.content.piece] == 0)
                  continue;
              }
              else
              {
                if (targetSquare.content.piece && targetSquare.content.color != this.turn && this.piecepower[square.content.piece] < this.piecepower[targetSquare.content.piece])
                  continue;
              }
            }
          }

          if (targetSquare.content.piece && targetSquare.content.color == this.turn)
            continue;
          temp.push(targetSquare);
        };

          return temp;
      },

      /**
       * Event trigerred on square onmouseenter
       * @param {MouseEvent} $event
       * @param {Number} squareRowIndex
       * @param {Number} squareColIndex
       * @returns {void}
       */
      squareMouseEnter($event, squareRowIndex, squareColIndex) {
        // If hover on a piece and the color is the current turn, show possible moves
        let square = this.squares[squareRowIndex][squareColIndex];
        if (
          square.content.piece &&
          square.content.color == this.turn &&
          !this.isHoldingChessPiece
        ) {
          this.showPossibleMoves(squareRowIndex, squareColIndex);
          document.body.style.cursor = "pointer";
        }
      },

      makeItPossible(square) {
        square.isPossibleMove = true;
        this.possibleMoves.push(square);
      },

      /**
       * Show knight's possible moves by row and column index
       * @param {Number} squareRowIndex
       * @param {Number} squareColIndex
       * @returns {void}
       */
      knightPossibleMoves(square, squareRowIndex, squareColIndex) {
        let moveTargets = helper.getKnightPossibleMoves(
          squareRowIndex,
          squareColIndex
        );

        moveTargets.forEach((target) => {
          let { rowIndex, colIndex } = target;

          if (square.content.piece == "mouse" || square.content.piece == "tiger" || square.content.piece == "lion")
          {
            if (rowIndex < 0 || colIndex < 0 || rowIndex > 8 || colIndex > 6)
              return;
          }
          else
            if (rowIndex < 0 || colIndex < 0 || rowIndex > 8 || colIndex > 6 || (rowIndex > 2 && rowIndex < 6) && (colIndex != 0 && colIndex != 3 && colIndex != 6))
              return;

          let targetSquare = this.squares[rowIndex][colIndex];

          // trap
          if (this.turn == 'white' && (targetSquare.code == 'E1' || targetSquare.code == 'C1' || targetSquare.code == 'D2'))
          {
            if (targetSquare.content.color == 'black')
              this.makeItPossible(targetSquare);
            return;
          }
          if (this.turn == 'black' && (targetSquare.code == 'E9' || targetSquare.code == 'C9' || targetSquare.code == 'D8'))
          {
            if (targetSquare.content.color == 'white')
              this.makeItPossible(targetSquare);
            return;
          }

          // tiger and lion can jump over the water
          if ((square.content.piece == "tiger" || square.content.piece == "lion") && targetSquare.color == "dark")
            if (squareColIndex == colIndex)
            {
              for (let i = 3; i < 6; i++) {
                const squ = this.squares[i][colIndex];
                if (squ.content.piece)
                  return;
              }
              rowIndex = 8 - squareRowIndex;
            }
            else
            {
              if (squareColIndex != 3)
                colIndex = 3;
              else
                colIndex = squareColIndex + (colIndex - squareColIndex) * 3;
              if (colIndex > squareColIndex)
                for (let i = squareColIndex + 1; i < colIndex; i++) {
                  const squ = this.squares[rowIndex][i];
                  if (squ.content.piece)
                    return;
                }
              else
                for (let i = colIndex + 1; i < squareColIndex; i++) {
                  const squ = this.squares[rowIndex][i];
                  if (squ.content.piece)
                    return;
                }
            }

          targetSquare = this.squares[rowIndex][colIndex];

          if (targetSquare.content.piece && targetSquare.content.color == this.turn)
            return;

          // mouse can move through the water
          if (square.content.piece == "mouse")
          {
            if (targetSquare.content.piece && targetSquare.content.color != this.turn && (6 >= this.piecepower[targetSquare.content.piece] && 0 < this.piecepower[targetSquare.content.piece]))
              return;
            if (targetSquare.content.piece && square.color == "dark" && targetSquare.color == "light")
              return;
          }
          else
          {
            if (square.content.piece == "elephant")
            {
              if (targetSquare.content.piece && targetSquare.content.color != this.turn && this.piecepower[targetSquare.content.piece] == 0)
                return;
            }
            else
              if (targetSquare.content.piece && targetSquare.content.color != this.turn && this.piecepower[square.content.piece] < this.piecepower[targetSquare.content.piece])
                return;
          }
          this.makeItPossible(targetSquare);
        });
      },

      /**
       * Show possible moves from a square
       * @param {Object} square
       * @returns {void}
       */
      showPossibleMoves(squareRowIndex, squareColIndex) {
        /*eslint no-unused-vars: "off"*/
        let square = this.squares[squareRowIndex][squareColIndex];
        return this.knightPossibleMoves(
          square,
          squareRowIndex,
          squareColIndex
        );
      },

      /**
       * Remove all possible moves
       */
      clearPossibleMoves() {
        for (let i = 0; i < this.possibleMoves.length; i++) {
          this.possibleMoves[i].isPossibleMove = false;
        }
        this.possibleMoves = ref([]);
      },

      /**
       * Event trigerred on square onmouseleave
       * @param {MouseEvent} $event
       * @param {Object} square
       * @returns {void}
       */
      squareMouseLeave($event, square) {
        document.body.style.cursor = "initial";
        if (!this.isHoldingChessPiece) this.clearPossibleMoves();
      },

      /**
       * Hold a chess piece to a square
       */
      holdPiece($event, square) {
        if (
          !square.content.piece ||
          square.content.color !== this.turn ||
          this.possibleMoves.length == 0
          )
          return;
        this.isHoldingChessPiece = square;
        square.visible = false;
      }

    }
  }
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
