/****************************************
Name:		Andrew Scheel
Z-ID:		Z1790270
Section:	section 3
Assignment:	Assignment 3
Due Date:	February 13 2018
Purpose:	For this computer assignment, you are to write and implement
		a C++ program to find and print all prime numbers within a
		range [lower upper] using the algorithmknown as
		the Sieve of Eratosthenes.
****************************************/

#include <iomanip>
#include <iostream>
#include <cstdlib>
#include <set>
#include <string>

const int NO_ITEMS = 6;
const int ITEM_W = 4;

using namespace std;

/****************************************
Function:	sieve
Use:		removes all non-prime numbers from the set of s
Parameters:	a set of ints, a lower range and an uppper range
Returns:	none
****************************************/
void sieve(set<int>& s, const int lower, const int upper)
{
	for(int j = 2; j*j < upper; j++)
	{
		for(set<int>::iterator i = s.begin(); i != s.end(); i++)
		{
			if(*i % j == 0 && *i != j)
			{
				s.erase(i);
				i--;
			}
		}
	}
	//takes care of 1 cause its not a prime number
	if(s.find(1) != s.end())
	{
		auto temp = s.find(1);
		s.erase(temp);
	}
}

/****************************************
Function:	print_primes
Use:		print out the prime numbers
Parameters:	a set of ints, a lower range and an upper range
Returns:	none
****************************************/
void print_primes(const set<int>& s, const int lower, const int upper)
{
	int counter = 0;
	set <int>::const_iterator i;
	cout << "There are " << s.size() << " prime numbers between " << lower << " and " << upper << ":" << endl;
	for(i = s.begin(); i != s.end(); i++)
	{
		if(counter % NO_ITEMS == 0 && counter > 0)
			cout << endl;
		cout << setw(ITEM_W) << *i;
		counter++;
	}
	cout << endl << endl;
}

/****************************************
Function:	run_game
Use:		runs the game and calls the other functions
Parameters:	the set of ints
Returns:	none
****************************************/
void run_game(set<int>& s)
{
bool game = true;
	while(game)
	{
		s.clear();
		int lower, upper;
		bool test = true;
		while(test)
		{
			cout << "Please input lower bound and upper bound and hit enter (e.g. 10 100):" << endl;
			cin >> lower;
			cin >> upper;

			if(lower < upper)
				test = false;
		}

		//filling the set in
		for(int i = lower; i <= upper; i++)
			s.insert(i);

		//take out all expect the primes
		sieve(s, lower, upper);
		print_primes(s, lower, upper);

		//continue?
		bool decision;
		string answer;
		cout << "Do you want to continue or not? Please answer yes or no and hit enter: " << endl;
		cin >> answer;
		if(answer.compare("yes") == 0 || answer.compare("y") == 0)
			decision = true;
		else if(answer.compare("no") == 0 || answer.compare("n") == 0)
			decision = false;

		if(decision == false)
			game = false;
		else if(decision == true)
			game = true;
	}
}

int main()
{
    set<int> s;
    run_game(s);
    return 0;
}
