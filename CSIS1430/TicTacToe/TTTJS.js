/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
var player1name = "";
var player2name = "";
var firstPlayer = player1name;
var player1 = 0;
var player2 = 0;
var cat = 0;
var scoreX = 0;
var scoreO = 0;
var value = 0;
var player = "X";
var winner = "";
var winsArray = [7, 56, 448, 73, 146, 292, 273, 84];
var clickedArray = [];
var clicksCount = 0;
var currentPlayer = "";

function start()
{
    player1Name = prompt("Enter first player's name", "");
    player2Name = prompt("Enter second player's name", "");
    currentPlayer = player1Name;
    document.getElementById("player").innerHTML = currentPlayer + " choose a square.";
}
function playerMoved(id, value)
{
    changeText(id);
    updateScore(value);

    if (player === "X")
    {
        check4winner(scoreX);
    }
    else
    {
        check4winner(scoreO);
    }

    if (winner !== "")
    {
        alert("winner:" + winner);
        document.getElementById("winner").innerHTML = currentPlayer + " WON!";
        startNewGame();
    }
    else
    {
        changePlayer();
    }
    swithPlayer();
}
function changeText(id)
{
    if (id.innerHTML === "")
    {
        clickedArray[clicksCount] = id;
        clicksCount = clicksCount + 1;

        if (player === "X")
        {
            id.innerHTML = "X";
        }
        else
        {
            id.innerHTML = "O";
        }
    }
}
function switchPlayer()
{
    if (currentPlayer === player1Name)
    {
        currentPlayer = player2Name;
    }
    else
    {
        currentPlayer = player1Name;
    }

    document.getElementById("player:").innerHTML = currentPlayer + " choose a square";
}
function updateScore(value)
{
    if (player === "X")
    {
        scoreX = scoreX + value;
    }
    else
    {
        scoreO = scoreO + value;
    }
}
function check4winner(score)
{
    var i;
    for (i = 0; i < winsArray.length; i++)
    {
        if ((winsArray[i] & score) === winsArray[i])
        {
            if (player === "X")
            {
                winner = "X";
            }
            else
            {
                winner = "O";
            }

            i = 99;
        }
    }
}
function changePlayer()
{
    if (player === "X")
    {
        player = "O";
    }
    else
    {
        player = "X";
    }
    document.getElementById("player").innerHTML = currentPlayer + " choose a square.";
}
function startNewGame()
{
    winner = "";
    scoreO = 0;
    scoreX = 0;

    for (i = 0; i < clickedArray.length; i++)
    {
        clickedArray[i].innerHTML = "";
    }
    if (firstPlayer === player1name)
    {
        firstPlayer = player2name;
    }
    else
    {
        firstPlayer = player1name;
    }
    currentPlayer = firstPlayer;
    document.getElementById("player").innerHTML = currentPlayer + " choose a square";
}


