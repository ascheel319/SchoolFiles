/****************************************
Name:		Andrew Scheel
Z-ID:		Z1790270
Section:	section 3
Assignment:	Assignment 9
Due Date:	5/2/18
Purpose:	For this computer assignment, you are to write a C++ program
		to implement several graph algorithms on simple graphs.
****************************************/

#include <iostream>
#include <fstream>
#include <vector>
#include <list>
#include "assignment9.h"
#include <string>
#include <algorithm>

using namespace std;

/****************************************
Function:	constructor
Use:		to construct
Parameters:	it is passed the file name argument
Returns:	none
****************************************/
graph::graph(const char* filename)
{
	pair = "";//this is needed later
	ifstream inFile(filename, ios::in);

	//the line of the input file
	string line;
	inFile >> size;

	//put the letters into the labels variable
	for(int i = 0; i < size; i++)
	{
		inFile >> line;
		labels.push_back(line[0]);
	}

	//put in what point goes where
	for(int i = 0; i < size; i++)
	{
		inFile >> line;
		adj_list.push_back(*(new list<int>()));
		for(int j = 0; j < size; j++)
		{
			int val;
			inFile >> val;
			adj_list[i].push_back(val);
		}
	}
}

/****************************************
Function:	destructor
Use:		to delete
Parameters:	none
Returns:	none
****************************************/
graph::~graph()
{

}

/****************************************
Function:	get_size
Use:		return the size data member
Parameters:	none
Returns:	the size data member
****************************************/
int graph::get_size() const
{
	return size;
}

/****************************************
Function:	depth_first
Use:		traverse a graph in the depth-first traversal/search
		algorithm starting at the vertex with the index value of v
Parameters:	the index of vector
Returns:	none
****************************************/
void graph::depth_first(int v)
{
	cout << labels[v] << " ";
	visit.push_back(v);
	int x = 0;
	for(auto i = adj_list[v].begin(); i != adj_list[v].end(); i++)
	{
		if(*i == 1 && find(visit.begin(),visit.end(), x) == visit.end())
		{
			pair += string("(") + labels[v] + string(", ") + labels[x] + string(") ");
			depth_first(x);
		}
		x++;
	}
}

/****************************************
Function:	traverse
Use:		to traverse a graph and invokes the above
		depth_first method.
Parameters:	none
Returns:	none
****************************************/
void graph::traverse()
{
	cout << "------- travere of graph ------" << endl;

	for(int i = 0; i < size; i++)
	{
		if(find(visit.begin(), visit.end(), i) == visit.end())
		{
			depth_first(i);
		}
	}
	cout << endl << pair << endl;
	pair = "";

	cout << "--------- end of traverse -------" << endl << endl;
}

/****************************************
Function:	print
Use:		to print
Parameters:	none
Returns:	none
****************************************/
void graph::print() const
{
	cout << "Number of vertices in the graph: " << get_size() << endl;
	cout << "-------- graph -------" << endl;
	//prints out the vectors
	for(int i = 0; i < size; i++)
	{
		cout << labels[i] << ": ";
		int counter = 0;
		for(auto it = adj_list[i].begin(); it != adj_list[i].end(); it++)
		{
			if(*it == 1)
			{
				cout << labels[counter] << ", ";
			}
			counter++;
		}
		cout << endl;
	}

	cout << "------- end of graph ------" << endl << endl;
}

#define ASSIGNMENT9_TEST
#ifdef 	ASSIGNMENT9_TEST

int main(int argc, char** argv)
{
	if ( argc < 2 )
	{
		cerr << "args: input-file-name" << endl;
		return 1;
	}

	graph g(argv[1]);

	g.print();

	g.traverse();

	return 0;
}

#endif
