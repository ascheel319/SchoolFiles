/****************************************
Name:		Andrew Scheel
Z-ID:		Z1790270
Section:	section 3
Assignment:	Assignment 1
Due Date:	January 29 2018
Purpose:	For this computer assignment, you are to write and implement
		a C++ program to implement two search algorithms (linear search
		and binary search) on randomly generated integers stored in vectors.
****************************************/
#include <iostream>
#include <iomanip>
#include <vector>
#include <algorithm>

using namespace std;

const int DATA_SIZE = 200;
const int DATA_RANGE = 200;
const int DATA_SEED = 9;
const int SEARCH_SEED = 17;

//constants that I defined
const int NO_ITEMS = 8;//number of numbers allowed on a line
const int ITEM_W = 4;//amount of space between the numbers


/****************************************
Function:	linear_search
Use:		to perform a linear search on the inputed vector
Parameters:	a vector, a search item, and a variable to track the number of times the linear search executes
Returns:	the place where it finds the searched for item
****************************************/
int linear_search(const vector<int>& inputVec, const int x, int& comparisons)
{
	comparisons = 0;

	for(size_t i = 0; i < inputVec.size(); i++)
	{
		comparisons++;
		if(inputVec[i] == x)
		{
			return i;
		}
	}
	return -1;
}

/****************************************
Function:       binary_search
Use:            to perform a binary search on the inputed vector
Parameters:     a vector, a search item, and a variable to track the number of times the binary search executes
Returns:        the place where it finds the searched for item
****************************************/

int binary_search(const vector<int>& inputVec, const int x, int& comparisons)
{
	int low = 0;
	int high = inputVec.size() - 1;
	int mid;

	comparisons = 0;

	while (low <= high)
	{
		mid = (low + high) / 2;

		comparisons++;

		if(x == inputVec[mid])
		{
			return mid;
		}

		if(x < inputVec[mid])
			high = mid - 1;

		else
			low = mid + 1;
	}
	return -1;
}

/****************************************
Function:	print_vec
Use:		to print out the inputed vector
Parameters:	a vector
Returns:	nothing
****************************************/

void print_vec( const vector<int>& vec )
{
	cout << "  ";//used for the first line to make it line up with the rest
	for(size_t i = 0; i < vec.size(); i++)
	{
		cout << vec[i] << setw(ITEM_W);//4 spaces between each number

		if((i+1) % NO_ITEMS == 0)//only 8 per line
			cout << endl;
	}
}

void average_comparisons(const vector<int>& inputVec, const vector<int>& searchVec, int (*search)(const vector<int>&, const int, int&) )
{
	int i, comparison = 0, sum = 0, found = 0;
	int res = 0;
	for (i = 0; i < (int)searchVec.size(); i++)
	{
		res = search( inputVec, searchVec[i], comparison );
		sum += comparison;
		if ( res >= 0 )
			found++;
	}
	cout << found << " numbers are found. The average number of comparisons in each search: " << (double)sum/(double)searchVec.size() << endl << endl;
}

int random_number()
{
	return rand()%DATA_RANGE + 1;
}


int main ()
{
	// -------- create unique random numbers ------------------//
	vector<int> inputVec(DATA_SIZE);
	srand(DATA_SEED);
	generate(inputVec.begin(), inputVec.end(), random_number);
	sort(inputVec.begin(), inputVec.end());
	vector<int>::iterator it = unique(inputVec.begin(), inputVec.end());
	inputVec.resize( it - inputVec.begin() );
	random_shuffle( inputVec.begin(), inputVec.end() );

	cout << "------ Data source: " << inputVec.size() << " unique random numbers ------" << endl; 
	print_vec(inputVec);
	cout << endl;

	// -------- create random numbers to be searched ---------//
	vector<int> searchVec(DATA_SIZE/2);
	srand(SEARCH_SEED);
	generate(searchVec.begin(), searchVec.end(), random_number);

	cout << "------ " << searchVec.size() << " random numbers to be searched: ------" << endl;
	print_vec(searchVec);
	cout << endl;

	cout << "Linear search: ";
	average_comparisons(inputVec, searchVec, linear_search);
	cout << "Binary search: ";
	average_comparisons(inputVec, searchVec, binary_search);

	sort(inputVec.begin(), inputVec.end());
	cout << "------- numbers in data source are now sorted ---------" << endl << endl;
	cout << "Linear search: ";
	average_comparisons(inputVec, searchVec, linear_search);
	cout << "Binary search: ";
	average_comparisons(inputVec, searchVec, binary_search);

	return 0;
}
