/****************************************
Name:		Andrew Scheel
Z-ID:		Z1790270
Section:	section 3
Assignment:	Assignment 1
Due Date:	Feburary 5 2018
Purpose:	In this assignment, you will use routines
		from STL <algorithm> to implement these
		algorithms.
****************************************/
#include <iostream>
#include <iomanip>
#include <vector>
#include <algorithm>
#include <cstdlib>

using namespace std;

//did not make these
const int DATA_SIZE = 100;
const int SEARCH_SIZE = 50;
const int DATA_SEED = 11;
const int SEARCH_SEED = 7;

//made these
const int NO_ITEMS = 10;//number of items per line
const int ITEM_W = 6;//number of space between numbers
const int LOW = 1;//for getRndNums
const int HIGH = 100;//for getRndNums

/****************************************
Function:	genRndNums
Use:		fill the vector with random numbers of a specific seed
Parameters:	the vector to be filled and the seed to be used
Returns:	none
****************************************/
void genRndNums(vector<int>& v, int seed)
{
	srand(seed);

	for(size_t i = 0; i < v.size(); i++)
	{
		v[i] = rand() % (HIGH - LOW + 1) + LOW;//range from low to high
	}
}

/****************************************
Function:	linearSearch
Use:		perform a linear search on the vector by calling it from the routine algoithm
Parameters:	the input vector and the search item
Returns:	a true if it finds the item and a false if it doesn't
****************************************/
bool linearSearch(const vector<int>& inputVec, int x)
{
	return find(inputVec.begin(), inputVec.end(), x) != inputVec.end();
}

/****************************************
Function:	binarySearch
Use:		perform a binary search on the inputed vector by calling it from the included routine algorithm
Parameters:	a vector to search through and a value to search for
Returns:	true if the searched for item is found and false if it is not found
****************************************/
bool binarySearch(const vector<int>& inputVec, int x)
{
    return binary_search(inputVec.begin(), inputVec.end(), x);
}

/****************************************
Function:	search
Use:		searches through the inputed vector with the inputed search type
Parameters:	a vector to search through, a vector of things to search for, and a type of search
Returns:	the number of successful searches
****************************************/
int search(const vector<int>& inputVec, const vector<int>& searchVec, bool (*p)(const vector<int>&, int))
{
	int success = 0;

	for(size_t i = 0; i < searchVec.size(); i++)
	{
		if(p(inputVec, searchVec[i]))
			success++;
	}
	return success;
}

/****************************************
Function:	sortVector
Use:		to sort the vector using the routine from algorithm
Parameters:	a vector to sort
Returns:	none
****************************************/
void sortVector (vector<int>& inputVec)
{
	sort(inputVec.begin(), inputVec.end());//could it really be that simple???
}

/****************************************
Function:	printStat
Use:		to print the percent of successful searches as a floating-point number
Parameters:	the total number of successes and the total size of the vector
Returns:	none
****************************************/
void printStat (int totalSucCnt, int vec_size)
{
	double num = ((double)totalSucCnt / (double)vec_size) * 100;

	cout << fixed << setprecision(2) << "Successful Searches: "  << num << "%" << endl;
}

/****************************************
Function:	print_vec
Use:		to print out the vector
Parameters:	a vector to be printed
Returns:	none
****************************************/
void print_vec(const vector<int>& vec)
{
	cout << "    ";//used for the first line to make it line up with the rest
	for(size_t i = 0; i < vec.size(); i++)
	{
		cout << vec[i] << setw(ITEM_W);//number of spaces between the numbers

		if((i+1) % NO_ITEMS == 0)//number of numbers per line
			cout << endl;
	}
}

int main()
{
	vector<int> inputVec(DATA_SIZE);
	vector<int> searchVec(SEARCH_SIZE);
	genRndNums(inputVec, DATA_SEED);
	genRndNums(searchVec, SEARCH_SEED);

	cout << "----- Data source: " << inputVec.size() << " randomly generated numbers ------" << endl;
	print_vec( inputVec );
	cout << "----- " << searchVec.size() << " random numbers to be searched -------" << endl;
	print_vec( searchVec );

	cout << "\nConducting linear search on unsorted data source ..." << endl;
	int linear_search_count = search( inputVec, searchVec, linearSearch );
	printStat ( linear_search_count, SEARCH_SIZE );

	cout << "\nConducting binary search on unsorted data source ..." << endl;
	int binary_search_count = search( inputVec, searchVec, binarySearch );
	printStat ( binary_search_count, SEARCH_SIZE );

	sortVector( inputVec );

	cout << "\nConducting linear search on sorted data source ..." << endl;
	linear_search_count = search( inputVec, searchVec, linearSearch );
	printStat ( linear_search_count, SEARCH_SIZE );

	cout << "\nConducting binary search on sorted data source ..." << endl;
	binary_search_count = search( inputVec, searchVec, binarySearch );
	printStat ( binary_search_count, SEARCH_SIZE );

	return 0;
}
