#include <stdio.h>
#include <stdlib.h>
#include <windows.h>
#include <mysql.h>
#include <winsock.h>
#include <string.h>
#include <dos.h>
#include <time.h>
#include "markingGuide.c"


MYSQL *conn;
MYSQL_RES *res;
MYSQL_RES *resViewAll;
MYSQL_ROW row;
MYSQL_ROW rowViewAll;


//declarations and initializations

    char pupilName[30],  pupilPassword[30], pupilCodeId[20], sqlquery[255];

    char name[30], password[20], code[20], activation[20], activationRequest[15], activationChoice[3];

	char lettersList[27] = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";

	int complexityMarkerList[26] = {8,5,3,4,3,3,6,4,3,5,6,3,6,5,6,8,8,7,7,3,4,4,6,7,5,5}, complexityMarker[8], letterIndex[8];

    char assignment[9];	//Assigned assignment by the teacher

    char assignmentName[15], assignmentNo[4], startDate[20], startTime[20], endDate[20], endTime[20], doneAssignment[15];

    double x, finalMark, letterMark, studentScore;
    int score,letterScore,sampleScore, answer[26][7][4];

     time_t start,finish;

    double duration,fullduration;


//login function
void login_module(){

              printf("\n\tEnter your pupilCode:  ");
                scanf("%s",pupilCodeId);

                printf("\n\tEnter your password:  ");
                scanf("%s",pupilPassword);

strcpy(sqlquery,"SELECT Id, userCode, firstName, lastName, pupilPassword, activationStatus, activationRequest FROM pupil");

//printf("\n%s\n",sqlquery);

    if(mysql_query(conn, sqlquery))
        {
        printf("\nQuery didn't run\n");
    }

    else{
      res = mysql_use_result(conn);

//printf("\n\n%d\n",mysql_num_rows(res));
 while((row = mysql_fetch_row(res))!= NULL)
 {

     if(strcmp(pupilCodeId,row[1])==0){

        strcpy(code,row[1]);
        strcpy(name,row[2]);
        strcat(name," ");
        strcat(name, row[3]);
        strcpy(password,row[4]);
        strcpy(activation,row[5]);
        strcpy(activationRequest,row[6]);

     }
 }
// printf("\n\n%s\t\t%s\n\n",code,pupilCodeId);
        if(strcmp(code, pupilCodeId)==0){
            if(strcmp(password,pupilPassword)==0){
                printf("\n\n\t\tWelcome: %s\t\t\t\tActivation Status: %s",name,activation);
                mysql_free_result(res);
            }

            else{
                  printf("\n\t\t Wrong password entered\n");
                mysql_free_result(res);
                login_module();
            }
    }
    else{
        printf("\nPupil not registered.  Kindly contact your teacher for registration\n\n");
        exit(0);
    }

    }


}

// Attempt assignment function
void attempt_Assignment_Module(){

Sleep(1000);

    if((strcmp(activation, "activated")) == 0){

        printf("\nEnter the assignmentNumber for that you wish to attempt:  ");
        scanf("%s",assignmentNo);

        mysql_free_result(res);
        strcpy(sqlquery, "SELECT assignmentName, assignment, attemptsAllowed FROM assignments WHERE assignmentId = ");
        strcat(sqlquery, assignmentNo);


        mysql_query(conn, sqlquery);

        res = mysql_use_result(conn);
        row = mysql_fetch_row(res);

    strcpy(assignmentName,row[0]);
    strcpy(assignment,row[1]);
    int attemptNumber = atoi(row[2]);      // converts alphabet to integer value to be used in comparison

    printf("\n\t%s\t\t%s\n",assignmentName, assignment);

mysql_free_result(res);

    strcpy(sqlquery, "SELECT count(userCode) AS \"attempted\" FROM marks WHERE userCode =\"");
    strcat(sqlquery, code);
    strcat(sqlquery, "\" AND assignmentName = \"");
    strcat(sqlquery, assignmentName);
    strcat(sqlquery, "\"");

    mysql_query(conn, sqlquery);
    res = mysql_use_result(conn);
    row = mysql_fetch_row(res);

    int attempted = atoi(row[0]); // attempted stores number of times the assignment has been attempted
    int attemptNew =  attempted +1; //new attempt prompt hence we add a 1 to it

    printf("\nNumber of attempts allowed: %d\t\tNumber of attempts used: %d",attemptNumber,attempted);

    mysql_free_result(res);

    if(attemptNew <= attemptNumber){       // tests if the new attempt number should be less or equal to the accepted attempts on a number

           for(int j=0; j<strlen(assignment);j++)
        {

        for(int i=0; i <strlen(lettersList); i++)
        {
            if(assignment[j] == lettersList[i]){

                    letterIndex[j] = i;
                    complexityMarker[j] = complexityMarkerList[i];

			}
		}
	}

printf("\n\n\t\tUse 1 or 0 to draw the letter \n \t\t.... Place a 1 where the Letter plot should appear or a 0 where it shouldn't'\n\n");

for(int k=0; k <strlen(assignment); k++) //Counter for the letters in the assignment
{

    start = time(NULL);
	printf("\n\n\n\t\t\tSketch the letter %c\t\t(%d marks)\n",assignment[k],complexityMarker[k]);
	printf("\n\n\tThe Expected correct pattern is\n");
    for(int i=0;i<7;i++)
    {
		for(int j=0;j<4;j++)
		{
			if(letters[letterIndex[k]][i][j] == 1)
			{
				printf("*");
			}
			else{
				printf(" ");
			}

		}
			printf("\n");
}

Sleep(500);
	printf("\n\n\tIt's your turn, try it out\n");

	for(int i=0;i<7;i++)
	{

	   // printf("Sketch the expected pattern for row %d, col 1 to 4:\t", i+1);
		for(int j=0;j<4;j++)
		{
			scanf("%d", &answer[k][i][j]);	//Accepts input from the pupil

			if(answer[k][i][j]== letters[letterIndex[k]][i][j])
			{
				score = score + 1; //For each correctly plotted point, the score variable is increased by one
				letterScore = letterScore + 1;	//letterScore variable is increased by one for each correct point plotted on a letter
			}
		}
	}
	finish = time(NULL);
	duration = difftime(finish,start);
	fullduration = fullduration + duration;

	Sleep(500);
	printf("\n\nThe drawn letter pattern is\n");
for(int i=0;i<7;i++)
{
		for(int j=0;j<4;j++)
		{
			if(answer[k][i][j] == 1)
			{
				printf("*");
			}
			else{
				printf(" ");
			}

		}
			printf("\n");
}

		letterMark = (letterScore/28.0)*complexityMarker[k];	//student mark scored on each letter as per the awarded marks for that letter

		printf("\n You have scored %.2f marks out of %d on the letter %c",letterMark,complexityMarker[k],assignment[k]);

		letterScore = 0;	//Reset back to zero so as to store new marks for next letter in assignment

		studentScore = studentScore + letterMark;	//cumulative student scores on letters attempted so far
		sampleScore = sampleScore + complexityMarker[k];		// cumulative sample space scores as assigned by the teacher


}


	printf("\n\n\n\tTotal number of correctly plotted points in this assignment is %d out of 224 points\n",score);

		//Calculating the pupil final mark
		x = studentScore/sampleScore;
		finalMark = (x*100);

		char finalMarkString[10];
		sprintf(finalMarkString, "%.2f", finalMark);

	printf("\n\tDear %s your final mark in the assignment is %.2f%%",name,finalMark);
	printf("\n\nThe assignment was completed in %.2f seconds",fullduration);

    strcpy(sqlquery, "INSERT INTO marks (userCode, assignmentName, finalMark) VALUES (\"");
    strcat(sqlquery,code);
    strcat(sqlquery, "\", \"");
    strcat(sqlquery, assignmentName);
    strcat(sqlquery, "\", \"");
    strcat(sqlquery, finalMarkString);
    strcat(sqlquery,"\")");

    printf("\n\n%s\n", sqlquery);

	if((mysql_query(conn, sqlquery))==0){
        printf("\n\nYour score has been recorded successfully\n\n");
            }
        }




    else{
        printf("\n\nAll attempt chances have been used up\n");
    }

    }
    else{
            printf("\n\nDear %s, you cannot attempt an assignment because your account is not Activated\n\n", name);
        }
    }

    // command function
void command_module(){

    char command[40]={};
    printf("\n\n\n\n\n\nEnter a command as directed in brackets\n");
    printf("\n\t1: To view assignments\t\t(Viewall)\n\t2: To view pupil status report\t(Checkstatus)\n\t3: view an assignment's details\t(Viewassignment assignmentid) \n\t4: view available assignments\t(Checkdates datefrom dateto)\n\t5: request for activation\t(RequestActivation)\n\t6: Logout\t\t\t(Logout)\n\n");

    scanf("%s",command);

    if(strcmp(command,"Viewall")== 0){
        char assignmentChoice[3];
        mysql_query(conn, "SELECT assignmentId, assignmentName, startDate, endDate, endTime, assignment FROM assignments");
        res = mysql_store_result(conn);

        printf("AssignmentNo\tAssignmentName\t\tAssignment\t\tAssignment Status\n");

        while (row = mysql_fetch_row(res)){

            // assigning the row results to easily understood variables
        strcpy(assignmentNo, row[0]);
        strcpy(assignmentName, row[1]);
        strcpy(assignment, row[5]);

        strcpy(sqlquery, "SELECT userCode from marks WHERE userCode = \"");
        strcat(sqlquery, code);
        strcat(sqlquery,"\" && assignmentName = \"");
        strcat(sqlquery, assignmentName);
        strcat(sqlquery,"\"");

        //mysql_free_result(res);

       if(mysql_query(conn, sqlquery)){
        printf("Query failed to run\n\n");
       }
       else{
           // printf("\n\n%s\n\n", sqlquery);
        resViewAll = mysql_store_result(conn);

        rowViewAll = mysql_fetch_row(resViewAll);

          if(mysql_num_rows(resViewAll)>0){
                strcpy(doneAssignment, "Attempted");
          }

            else {
                strcpy(doneAssignment, "Not attempted");
            }
       }


        printf("%s\t\t%s\t\t%s\t\t\t%s\n", assignmentNo,assignmentName,assignment,doneAssignment);

        }
        mysql_free_result(res);

        printf("\nDo you wish  to attempt any assignment? type Y for Yes or N for No\n");
        scanf("%s",assignmentChoice);

        if(strcmp(assignmentChoice, "Y")== 0){
            attempt_Assignment_Module();
        }
        else{
            command_module();
        }
    }
    else if((strcmp(command,"Checkstatus")== 0)) {
         strcpy(sqlquery, "SELECT count(userCode) AS \"totalAttempted\", avg(finalMark) AS \"averageMark\" FROM marks WHERE userCode = \"");
         strcat(sqlquery, code);
         strcat(sqlquery, "\"");
        // printf("\n%s", sqlquery);

        mysql_query(conn, sqlquery);
        res = mysql_use_result(conn);
        row = mysql_fetch_row(res);
            int totalAttempted = atoi(row[0]);
            float averageMark = atof(row[1]);
        mysql_free_result(res);



        strcpy(sqlquery,"SELECT count(assignmentName) AS \"totalAssignments\" FROM assignments");

        mysql_query(conn, sqlquery);
        res = mysql_use_result(conn);
        row = mysql_fetch_row(res);
            int totalAssignments = atoi(row[0]);
            float percentageAttempted = ((float)totalAttempted/totalAssignments)*100;
            float percentageMissed = 100-percentageAttempted;

//printf("%d\t\t%.2f\t%d\t%.2f",totalAttempted, averageMark,totalAssignments,percentageAttempted);

            printf("\n\t\t\t STATUS REPORT\n\t\t\t---------------\n");
            printf("\n\n\t\tPupil Name:  %s\t\t\tPupil Id:  %s\n",name,code);
            printf("\n\n\t\t\t\tNumber of attempted assignments:  %d\n",totalAttempted);
            printf("\n\n\t\tAverage Score:  %.2f\t\tPercentage Attempted:  %.2f%%\t\tPercentage Missed:  %.2f%%",averageMark,percentageAttempted,percentageMissed);




    }

    else if((strncmp(command,"Viewassignment_assignmentid",14)== 0)) {
            char assignmentDisplay[4];

        strcpy(assignmentDisplay,&command[15]); // stores the assignment Id to be displayed

       strcpy(sqlquery, "SELECT assignmentId, assignmentName, startDate, endDate, endTime, assignment FROM assignments WHERE assignmentId = ");
       strcat(sqlquery, assignmentDisplay);

       //printf("\n%s\n",sqlquery);

        mysql_query(conn, sqlquery);
        res = mysql_use_result(conn);
        row = mysql_fetch_row(res);

        strcpy(assignmentNo, row[0]);
        strcpy(assignmentName, row[1]);
        strcpy(startDate, row[2]);
       // strcpy(startTime, row[3]);
        strcpy(endDate, row[3]);
       // strcpy(endTime, row[5]);
        strcpy(assignment,row[5]);

        mysql_free_result(res);

        printf("\n\n\t\tAssignmentId:\t%s\t\t\t\tAssignmentName:\t%s\n\n\t\tStart Date:\t%s\t\t\tEnd Date:\t%s\n\n\t\t\t\t\tAssignment:\t%s",assignmentNo, assignmentName, startDate, endDate,assignment);
    }

    else if((strncmp(command,"Checkdates_datefrom_dateto",11)== 0)) {
            char date1[12], date2[12];
            strncpy(date1, &command[11],10);
            strcpy(date2, &command[22]);
        strcpy(sqlquery,"SELECT assignmentName, startDate, endDate FROM assignments WHERE endDate BETWEEN \"");
        strcat(sqlquery,date1);
        strcat(sqlquery,"\" AND \"");
        strcat(sqlquery, date2);
        strcat(sqlquery, "\"");

       // printf("\n%s\n", sqlquery);

        mysql_query(conn, sqlquery);
        res = mysql_use_result(conn);
        printf("\n\n\t\tAssignment Name\t\t Start Date\t\tEnd Date\n\n");
        while(row = mysql_fetch_row(res)){
                strcpy(assignmentName, row[0]);
                strcpy(startDate, row[1]);
                strcpy(endDate, row[2]);

            printf("\t\t%s\t\t%s\t\t%s\n",assignmentName,startDate,endDate);
        }
    }

    else if((strcmp(command,"RequestActivation")== 0)) {

            if(strcmp(activation, "Deactivated")== 0){
                if(strcmp(activationRequest, "sent")== 0){
                    printf("\nActivation Request is already sent\n");
                }
                else {
                        printf("\nEnter Y to request activation or N to cancel\n");
                scanf("%s",activationChoice);
                if(strcmp(activationChoice, "Y")== 0){
                    strcpy(sqlquery,"UPDATE pupil SET activationRequest = \"sent\" WHERE userCode = \"");
                    strcat(sqlquery,code);
                    strcat(sqlquery,"\"");

                  //  printf("\n%s", sqlquery);

                    mysql_query(conn, sqlquery);

                    if(mysql_query(conn, sqlquery)){ // works as a negative test in C API programming
                        printf("\nActivation Request not Sent\n");
                    }
                    else{
                        printf("\nActivation request sent successively\n");

                    }

                }
               else if(strcmp(activationChoice, "N")== 0){
                    printf("\nActivation request canceled by user\n");
                }
                else{
                    printf("\nInvalid Input\n");
                }

                }

            }
            else{
                printf("\nDear %s, your account is already activated\n", name);
            }
    }


    else if((strcmp(command,"Logout")== 0))    {
        printf("\n\nLogout success");
                mysql_free_result(res);
                login_module();

    }
    else{
        printf("\nError:  Entered command unknown");

    }
}

// main function, program execution starts here
int main()
{
    conn = mysql_init(NULL);
    conn = mysql_real_connect(conn,"localhost","root","","recess",0,NULL,0);

   // struct date dt[20];
    //getdate(&dt);

    printf("\t\t\t****Welcome to Kindercare Application System****\n\n");
    //printf("\n\n\t\t\t%d-%d-%d",dt.da_year,dt.da_mon,dt.da_day);


int choice;
    printf("Choose Option:\n\t1: Login\n\t2: Exit \n\n");
    scanf("%d", &choice);

   switch(choice){
        case 1:
                login_module();
                break;

        case 2: exit(0);
                break;

        default: printf("Wrong input\n\n");
    };


while(1){

command_module(); //calling the command_module function

}

        mysql_close(conn);

    return 0;
}

