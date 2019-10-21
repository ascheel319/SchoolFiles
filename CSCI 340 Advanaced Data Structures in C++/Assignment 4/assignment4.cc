/****************************************
Name:		Andrew Scheel
Z-ID:		Z1790270
Section:	section 3
Assignment:	4
Due Date:	2/22/18
Purpose:	For this computer assignment, you are
		to implement the Queue class using STL stacks.
****************************************/
#include "assignment4.h"

#include <iomanip>
#include <iostream>
#include <string>

using namespace std;

/****************************************
Function:	empty
Use:		to check if the stack is empty or not
Parameters:	none
Returns:	true if it is empty and false if it is not empty
****************************************/
bool Queue::empty() const
{
	if(s1.empty() && s2.empty())
		return true;

	return false;
}

/****************************************
Function:	size
Use:		returns the size of both the s1 and s2 together
Parameters:	none
Returns:	int of the size of s1 and s2
****************************************/
int Queue::size() const
{
	int count = 0;
	count = s1.size() + s2.size();
	return count;
}

/****************************************
Function:	front
Use:		return the oldest element
Parameters:	none
Returns:	the oldest element
****************************************/
int Queue::front()
{
	if(s2.empty())
	{
		while(!s1.empty())
		{
			s2.push(s1.top());
			s1.pop();
		}
	}
	return s2.top();
}

/****************************************
Function:	back
Use:		returns the newest element
Parameters:	none
Returns:	the newest element
****************************************/
int Queue::back()
{
	return s1.top();
}

/****************************************
Function:	push
Use:		to add an element ot the s1
Parameters:	the value to input
Returns:	none
****************************************/
void Queue::push(const int& val)
{
	s1.push(val);
}

/****************************************
Function:	pop
Use:		removes the oldest element
Parameters:	none
Returns:	none
****************************************/
void Queue::pop()
{
	s2.pop();
}

int main()
{
	Queue q;
	string op;
	int val = 0;

	cout << "operation -- size front end" << endl;
	cin >> op;
	while ( !cin.eof() )
	{
		if(op == "push")
		{
			cin >> val;
			q.push( val );
			cout << op << " " << val << "    -- ";
		}
		else if(op == "pop")
		{
			q.pop();
			cout << op << "       -- ";
		}
		else
		{
			cerr << "Error input: " << op << endl;
			return 1;
		}
	cout << setw(3) << q.size() << setw(5) << q.front() << setw(5) << q.back() << endl;
	cin >> op;
	}

	while (!q.empty())
		q.pop();

	return 0;
}
