const animals =  {
    mouse: {
        name: "mouse",
        power: 0,
        specialPower: {
            canSwim: true,
            canBeat: ["elephant"],
        },
    },
    cat: {
        name: "cat",
        power: 1,
    },
    monkey: {
        name: "monkey",
        power: 2,
    },
    dog: {
        name: "dog",
        power: 3,
    },
    leopard: {
        name: "leopard",
        power: 4,
    },
    tiger: {
        power: 5,
        name: "tiger",
        specialPower: {
            canJumpOverTheRiver: true,
            jumpDirections: ["vertical"],
        },
    },
    lion: {
        name: "lion",
        power: 6,
        specialPower: {
            canJumpOverTheRiver: true,
            jumpDirections: ["vertical", "horizontal"],
        },
    },
    elephant: {
        name: "elephant",
        power: 7,
        vulnerability: ["mouse"],
    },
};
const protectHouseCodes = {
    black:["A9", "B8", "C7", "E7", "F8", "G9", "B7", "F7", "D7"],
    white:["A1", "B2", "C3", "E3", "F2", "G1", "B3", "F3", "D3"],
}
const AllBoardCodes = [
    "A9",   "B9",  "C9",  "D9",  "E9",  "F9",   "G9",
    "A8",   "B8",  "C8",  "D8",  "E8",  "F8",   "G8",
    "A7",   "B7",  "C7",  "D7",  "E7",  "F7",   "G7",

    "A6",  "!B6!","!C6!", "D6", "!E6!","!F6!",  "G6",
    "A5",  "!B5!","!C5!", "D5", "!E5!","!F5!",  "G5",
    "A4",  "!B4!","!C4!", "D4", "!E4!","!F4!",  "G4",

    "A3",   "B3",  "C3",  "D3",  "E3",  "F3",   "G3",
    "A2",   "B2",  "C2",  "D2",  "E2",  "F2",   "G2",
    "A1",   "B1",  "C1",  "D1",  "E1",  "F1",   "G1",
]

const waterCodes = [
    "B6", "C6", "B5", "C5", "B4", "C4",
    "E6", "F6", "E5", "F5", "E4", "F4",
];

const trapCodes = {
    black: ["C9", "D8", "E9"],
    white: ["C1", "D2", "E1"],
    all:["C9", "D8", "E9", "C1", "D2", "E1"]
};
const trapGuards = {
    C1: ["C2", "B1"],
    D2: ["C2", "D3", "E2"],
    E1: ["E2", "F1"],
    C9: ["B9", "C8"],
    D8: ["C8", "D7", "E8"],
    E9: ["E8", "F9"],
};
const lowGuardCodes = {
    black: ["D7","F9","E8"],
    white: ["B1","D3","E2"],
};

const highGuardCodes = {
    black: ["C8","E8"],
    white: ["C2","E2"],
};

const houseCodes = {
    black: "D9",
    white: "D1",
    all: ["D9", "D1"]
};
export {
    waterCodes,
    animals,
    trapCodes,
    lowGuardCodes,
    highGuardCodes,
    trapGuards,
    houseCodes,
    protectHouseCodes
}
