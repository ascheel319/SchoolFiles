/****************************************
Name:		Andrew Scheel
Z-ID:		Z1790270
Section:	section 3
Assignment:	Assignment 7
Due Date:	4/4/18
Purpose:	For this computer assignment, you are to write
		a C++ program to sort numbers using the heapsort
		technique.
****************************************/

#include <iostream>
#include <iomanip>
#include <vector>
#include <algorithm>

using namespace std;

const int HEAP_SIZE = 50;
/****************************************
Function:	heapify
Use:		heapifies the tree
Parameters:	the vector, the size, if it is greater than or less than
Returns:	none
****************************************/
void heapify(vector <int>& v, int heap_size, int x, bool (*compar)(int, int))
{
		int i = 0;
		int l = (2 * x);
		int r = (2 * x) + 1;

		if(l <= heap_size && compar(v[l], v[x]))
			i = l;
		else
			i = x;

		if(r <= heap_size && compar(v[r], v[i]))
			i = r;
		if(i != x)
		{
			int temp = v[i];
			v[i] = v[x];
			v[x] = temp;
			heapify(v, heap_size, i, compar);
		}
}

/****************************************
Function:       build_heap
Use:            to build the heap
Parameters:     the vector, the size, if it is greater or less than
Returns:        none
****************************************/
void build_heap(vector <int>& v, int heap_size, bool (*compar) (int, int))
{
                for(int i = heap_size / 2; i > 0; i--)
                        heapify(v, heap_size, i, compar);
}


/****************************************
Function:	less_than
Use:		to test if a number is less than another number
Parameters:	2 int numbers
Returns:	returns true if the first number is less than the 2nd
		returns false if the second number is less than the first
****************************************/
bool less_than (int e1, int e2)
{
	if(e1 < e2)
		return true;
	else
		return false;
}

/****************************************
Function:	greater_than
Use:		to tell if a number is greater than another number
Parameters:	2 int numbers
Returns:	true if the first is greater than the second number
		false if the second is greater than the first number
****************************************/
bool greater_than (int e1, int e2)
{
	if(e1 > e2)
		return true;
	else
		return false;
}

/****************************************
Function:	extract_heap
Use:		This function extracts the root of the heap recorded in v, fills the
		root with the last element of the current heap, updates heap_size, “heapifies”
		at the root, and returns the old root value.
Parameters:	the vector, the size of the heap, if it is greater than or less than
Returns:	the old root value
****************************************/
int extract_heap (vector <int>& v, int& heap_size, bool (*compar)(int, int))
{
	int num = v[1];
	v[1] = v[heap_size];
	v[heap_size] = num;
	heap_size--;
	heapify(v, heap_size, 1, compar);
	return num;
}

/****************************************
Function:       heap_sort
Use:            to sort the heap
Parameters:     the vector, the size, and if it is greater or less than
Returns:        none
****************************************/
void heap_sort (vector <int>& v, int heap_size, bool (*compar)(int, int))
{
	while (heap_size > 1)
		extract_heap(v, heap_size, compar);

	reverse(v.begin() + 1, v.end());
}

/****************************************
Function:	print_vector
Use:		to print the vector
Parameters:	the vector, the position to start in the vector, and the size of the vector
Returns:	none
****************************************/
void print_vector (vector <int>& v, int pos, int size)
{
	//size is the size of vector
	//pos is where the size starts

	int numline = 8;
	int numspace = 5;

	for(int i = pos; i <= size; i++)
	{
		cout << setw(numspace) << v[i];
		 if((i) % numline == 0)
                        cout << endl;
	}
	cout << endl;
}


//the main
int main(int argc, char** argv) {
	// ------- creating input vector --------------
	vector<int> v;
	v.push_back(-1000000);    // first element is fake
	for (int i=1; i<=HEAP_SIZE; i++)
		v.push_back( i );
	random_shuffle( v.begin()+1, v.begin()+HEAP_SIZE+1 );

	cout << "\nCurrent input numbers: " << endl;
	print_vector( v, 1, HEAP_SIZE );

	// ------- testing min heap ------------------
	cout << "\nBuilding a min heap..." << endl;
	build_heap(v, HEAP_SIZE, less_than);
	cout << "Min heap: " << endl;
	print_vector( v, 1, HEAP_SIZE );
	heap_sort( v, HEAP_SIZE, less_than);
	cout << "Heap sort result (in ascending order): " << endl;
	print_vector( v, 1, HEAP_SIZE );

	// ------- testing max heap ------------------
	cout << "\nBuilding a max heap..." << endl;
	build_heap(v, HEAP_SIZE, greater_than);
	cout << "Max heap: " << endl;
	print_vector( v, 1, HEAP_SIZE );
	heap_sort( v, HEAP_SIZE, greater_than);
	cout << "Heap sort result (in descending order): " << endl;
	print_vector( v, 1, HEAP_SIZE );

	return 0;
}
