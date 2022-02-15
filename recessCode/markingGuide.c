/*
The code below is an external c program for the letters matrix.
 It contains the correctly plotted points for the letters.
 	The pupil's input in the attemptExercise.c program is compared with what is recorded here

*/

int letters[26][7][4] = {
{0,1,1,0,1,0,0,1,1,0,0,1,1,1,1,1,1,0,0,1,1,0,0,1,1,0,0,1},		//Expected plotting for letter A
{1,1,1,0,1,0,0,1,1,0,0,1,1,1,1,0,1,0,0,1,1,0,0,1,1,1,1,0},  	//Expected plotting for letter B
{0,0,1,1,0,1,0,0,1,0,0,0,1,0,0,0,1,0,0,0,0,1,0,0,0,0,1,1},		//Expected plotting for letter C
{1,1,1,0,1,0,0,1,1,0,0,1,1,0,0,1,1,0,0,1,1,0,0,1,1,1,1,0},		//Expected plotting for letter D
{1,1,1,1,1,0,0,0,1,0,0,0,1,1,1,0,1,0,0,0,1,0,0,0,1,1,1,1},		//Expected plotting for letter E
{1,1,1,1,1,0,0,0,1,0,0,0,1,1,1,0,1,0,0,0,1,0,0,0,1,0,0,0},		//Expected plotting for letter F
{1,1,1,1,1,0,0,0,1,0,0,0,1,1,1,1,1,0,0,1,1,0,0,1,1,1,1,1},		//Expected plotting for letter G
{1,0,0,1,1,0,0,1,1,0,0,1,1,1,1,1,1,0,0,1,1,0,0,1,1,0,0,1},		//Expected plotting for letter H
{1,1,1,1,0,1,0,0,0,1,0,0,0,1,0,0,0,1,0,0,0,1,0,0,1,1,1,1},		//Expected plotting for letter I
{1,1,1,1,0,0,1,0,0,0,1,0,0,0,1,0,0,0,1,0,0,0,1,0,1,1,1,0},		//Expected plotting for letter J
{1,0,0,1,1,0,1,0,1,1,0,0,1,0,0,0,1,1,0,0,1,0,1,0,1,0,0,1},		//Expected plotting for letter K
{1,0,0,0,1,0,0,0,1,0,0,0,1,0,0,0,1,0,0,0,1,0,0,0,1,1,1,1},		//Expected plotting for letter L
{1,0,0,1,1,1,0,1,1,0,1,1,1,0,0,1,1,0,0,1,1,0,0,1,1,0,0,1},		//Expected plotting for letter M
{1,0,0,1,1,1,0,1,1,0,1,1,1,0,1,1,1,0,0,1,1,0,0,1,1,0,0,1},		//Expected plotting for letter N
{0,0,1,1,0,1,0,1,1,0,0,1,1,0,0,1,1,0,0,1,1,0,0,1,0,1,1,0},		//Expected plotting for letter O
{0,1,1,0,0,1,0,1,0,1,0,1,0,1,1,0,0,1,0,0,0,1,0,0,0,1,0,0},		//Expected plotting for letter P
{0,1,1,1,1,0,0,1,1,0,0,1,1,0,0,1,1,0,0,1,0,1,1,1,0,0,1,1},		//Expected plotting for letter Q
{0,1,1,1,0,1,0,1,0,1,0,1,0,1,1,0,0,1,1,0,0,1,0,1,0,1,0,1},		//Expected plotting for letter R
{0,0,1,1,0,1,0,0,0,1,0,0,0,0,1,0,0,0,1,0,0,0,1,0,1,1,0,0},		//Expected plotting for letter S
{1,1,1,1,0,1,0,0,0,1,0,0,0,1,0,0,0,1,0,0,0,1,0,0,0,1,0,0},		//Expected plotting for letter T
{1,0,0,1,1,0,0,1,1,0,0,1,1,0,0,1,1,0,0,1,1,0,0,1,1,1,1,1},		//Expected plotting for letter U
{1,0,0,1,1,0,0,1,0,1,0,1,0,1,1,0,0,1,1,0,0,0,1,0,0,0,1,0},		//Expected plotting for letter V
{1,0,0,1,1,0,0,1,1,0,0,1,1,0,0,1,1,0,1,1,1,0,1,1,1,0,1,1},		//Expected plotting for letter W
{1,0,0,1,0,1,0,1,0,1,1,0,0,1,0,0,1,0,1,0,1,0,1,0,1,0,0,1},		//Expected plotting for letter X
{1,0,0,1,1,1,0,1,0,1,1,1,0,0,1,1,0,0,0,1,0,0,0,1,0,0,0,1},		//Expected plotting for letter Y
{1,1,1,1,0,0,1,1,0,0,1,0,0,1,0,0,0,1,0,0,1,0,0,0,1,1,1,1}       //Expected plotting for letter Z

};
