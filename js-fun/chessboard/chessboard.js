function chessBoard(width, height) {
  let chessBoard = "\n";
  for (let i = 0; i < height; i++) {
    if (i % 2 === 0 ) {
      chessBoard += " #".repeat(width) + "\n";
    }
    else {
      chessBoard += "# ".repeat(width) + "\n";
    }
  }
  console.log(chessBoard);
}
chessBoard(10, 6);