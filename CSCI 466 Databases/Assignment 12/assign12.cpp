/*
Andrew Scheel
z1790270
section 3
Assignment 12
Due Date: 5/4/18*/

#include <iomanip>
#include <iostream>
#include <mysql.h>

#include <vector>
#include <string>

using namespace std;

//what I need to do:
/*
You are to write a c++ program that will list each marina (the appropriate information),
	then under that each owner first and last name and city,
		then under each owner list each boat,
			and under each boat list all of the service requests (description and status).
*/
MYSQL *conn, mysql;
MYSQL_RES *resmarina, *resowner, *resboat, *resservice;
MYSQL_ROW rowmarina, rowowner, rowboat, rowservice;

//statements
int query_state;

int main()
{
	const char *host = "courses";
	const char *user = "z1790270";
	const char *passwd = "1998Mar19";
	const char *db = "z1790270";
	unsigned int port = 0;
	const char *unix_socket = NULL;
	unsigned long client_flag = 0;

	//connecting to the server
	*mysql_init(&mysql);
	conn=mysql_real_connect(&mysql, host, user, passwd, db, 0, 0, 0);
	//if it doesn't connect
	if(conn==NULL)
   	{
       		cout<<"not connected"<<endl<<endl;
      		return 1;
   	}
	//the sql statement if it connects
		//test statement
	query_state=mysql_query(conn, "select Name, MarinaNum from Marina");
	if(query_state!=0)
	{
		//if the statement is invalid
		cout<<"invalid select"<<endl<<endl;
		return 1;
	}
	resmarina=mysql_store_result(conn);
//start of marina part
	while((rowmarina=mysql_fetch_row(resmarina))!=NULL)
	{
		cout << "Marina: " << rowmarina[0] << endl;
		string mnum = rowmarina[1];
		string sqlSelect = "select FirstName, LastName, City from Owner, MarinaSlip where Owner.OwnerNum = MarinaSlip.OwnerNum AND MarinaSlip.MarinaNum =  " + mnum;
		query_state=mysql_query(conn, sqlSelect.c_str());
		if(query_state!=0)
        	{
                	//if the statement is invalid
                	cout<<"invalid select"<<endl<<endl;
                	return 1;
        	}
//start of owner part
		resowner=mysql_store_result(conn);
		while((rowowner=mysql_fetch_row(resowner))!=NULL)
		{
//			cout << "Marina Owners" << endl;
			for(int i = 0; i < 3; i++)
			{
				if(i == 0)
					cout << "\t" << "First Name: ";
				else if(i == 1)
					cout << "\t" << "Last Name: ";
//				cout << left << "\t";
				if(i == 2)
				{
					cout << "\t" << "City: ";
				}
				cout << rowowner[i];
			}
			cout << endl;

//start of boat part
			string ownName = rowowner[1];
			string sqlBoat = "SELECT BoatName FROM MarinaSlip, Owner WHERE Owner.OwnerNum = MarinaSlip.OwnerNum AND Owner.LastName = '" + ownName + "'";
			query_state=mysql_query(conn, sqlBoat.c_str());
			if(query_state!=0)
	                {
	                        //if the statement is invalid
	                        cout<<"invalid select"<<endl<<endl;
	                        return 1;
	                }
			resboat = mysql_store_result(conn);
			while((rowboat=mysql_fetch_row(resboat))!=NULL)
			{
				for(int i = 0; i < 1; i++)
					cout << left << "\t\tBoat Name: "<< rowboat[i] << endl;

//start of service part
				string  boatName = rowboat[0];
				string sqlService = "SELECT Description, Status FROM ServiceRequest, MarinaSlip WHERE ServiceRequest.SlipID = MarinaSlip.SlipID AND MarinaSlip.BoatName = '" + boatName + "'";
				query_state=mysql_query(conn, sqlService.c_str());
				if(query_state!=0)
		                {
		                        //if the statement is invalid
		                        cout<<"invalid select"<<endl<<endl;
	        	                return 1;
	                	}
				resservice = mysql_store_result(conn);
				while((rowservice=mysql_fetch_row(resservice))!=NULL)
				{
					for(int i = 0; i < 2; i++)
					{
						if(i == 0)
							cout << "\t\t\tDescription: ";
						else
							cout << "\t\t\tStatus: ";

						cout << left << setw(18) << rowservice[i] << endl;
					}
					cout << endl;
				}

			}

		}
	}
	void mysql_close(MYSQL *mysql);
}
