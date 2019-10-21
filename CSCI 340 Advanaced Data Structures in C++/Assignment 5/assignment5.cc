/****************************************
Name:		Andrew Scheel
Z-ID:		Z1790270
Section:	section 3
Assignment:	Assignment 5
Due Date:	March 5th, 2018
Purpose:	For this computer assignment, you are to
		write a C++ program to implement classes
		to represent a binary tree (of integers).
****************************************/
#include <iostream>
#include <iomanip>
#include <algorithm>
#include <vector>
#include "assignment5.h"
using namespace std;

const int MAX_SIZE = 40;
const int MAX_COUNT = 40;
const int WIDTH = 5;
const int ROW_SIZE = 8;

int mcount = 0;
int rcount = 0;

/****************************************
Function:	default contructor
Use:		whatever a default contructor does
Parameters:	none
Returns:	none
****************************************/
binTree::binTree()
{
	root = NULL;
}
//*************************public methods*******************************

/****************************************
Function:	height
Use:		to return the height of the tree from the private height method
Parameters:	none
Returns:	the height of the tree
****************************************/
int binTree::height() const //public method
{
	return height(root);
}

/****************************************
Function:	size
Use:		return the size of the tree from the private size method
Parameters:	none
Returns:	none
****************************************/
unsigned binTree::size() const //public method
{
	return size(root);
}

/****************************************
Function:	insert
Use:		calls the private insert method and has that insert the num into the node
Parameters:	a number to insert into the tree
Returns:	none
****************************************/
void binTree::insert(int num) //public method
{
	insert(root, num);
}

/****************************************
Function:	inorder
Use:		calls the private inorder method and has that transverse the tree
Parameters:	an integer
Returns:	none
****************************************/
void binTree::inorder(void(* a)(int)) //public method
{
	inorder(root, a);
}

/****************************************
Function:	preorder
Use:		calls the private preorder method and has that transverse the tree
Parameters:	an integer
Returns:	none
****************************************/
void binTree::preorder(void(* a) (int)) //public method
{
	preorder(root, a);
}

/****************************************
Function:	postorder
Use:		calls the private postorder method and has that transverse the tree
Parameters:	an integer
Returns:	none
****************************************/
void binTree::postorder(void(* a) (int)) // public method
{
	postorder(root, a);
}
//************************End of public methods*****************************************


//************************private methods**************************************

/****************************************
Function:	height
Use:		to return the height of the tree
Parameters:	the root of the tree
Returns:	the height of the tree
****************************************/
int binTree::height(Node * r) const
{
	if(r == NULL)
	{
		return -1;
	}
	else
	{
		int leftDepth = height(r->left);
		int rightDepth = height(r->right);

		if(leftDepth > rightDepth)
			return (leftDepth + 1);
		else
			return (rightDepth + 1);
	}
}

/****************************************
Function:	size
Use:		to return the size of the tree
Parameters:	the root of the tree
Returns:	the size of the tree
****************************************/
unsigned binTree::size(Node * r) const
{
	if(r == NULL)
	{
		return 0;
	}
	else
//	if(r != NULL)
	{
		return size(r->left) + size(r->right) + 1;
	}
//	else
//		return 0;

}

/****************************************
Function:	insert
Use:		to put a number into the tree
Parameters:	the root of the tree and the number
		that is to inserted into the tree
Returns:	none
****************************************/
void binTree::insert(Node*& r, int x)
{
	if(r == NULL)
		r = new Node(x);
	else
	{
		if(size(r->left) <= size(r->right))
			insert(r->left, x);
		else
			insert(r->right, x);
	}
}

/****************************************
Function:	inorder
Use:		to go through the tree in the order of inorder
Parameters:	the root of the tree and a pointer to an integer
Returns:	none
****************************************/
void binTree::inorder(Node* r, void(* p)(int))
{
	//if node is not empty
	if(r != NULL)
	{
		//      inorder(n left child)
		inorder(r->left, p);
		//      visit node
		p(r->data);
		//      inorder(n right child)
		inorder(r->right, p);
	}
}

/****************************************
Function:	preorder
Use:		to go through the tree in the order of preorder
Parameters:	the root of the tree and a pointer to an integer
Returns:	none
****************************************/
void binTree::preorder(Node* r, void(* p)(int))
{
	//if node is not empty
	if(r != NULL)
	{
	//	visit node
		p(r->data);
	//	preorder(n left child)
		preorder(r->left, p);
	//	preorder(n right child)
		preorder(r->right, p);
	}
}

/****************************************
Function:	postorder
Use:		to go through the tree in the order of postorder
Parameters:	the root of the tree and a pointer to an integer
Returns:	none
****************************************/
void binTree::postorder(Node* r, void(* p)(int))
{
	//if node is not empty
	if(r != NULL)
	{
	//	postorder(n left child)
		postorder(r->left, p);
	//	postorder(n right child)
		postorder(r->right, p);
	//	visit node
		p(r->data);
	}
}

//**********************End of private methods**********************************************

void display(int d)
{
	if ( mcount < MAX_COUNT )
	{
		cout << setw(WIDTH) << d;
		mcount++;
		rcount++;
		if ( rcount == ROW_SIZE )
		{
			cout << endl;
			rcount = 0;
		}
	}
}

#define BINTREE_MAIN
#ifdef BINTREE_MAIN
int main()
{
	vector<int> v(MAX_SIZE);
	for (int i=1; i<MAX_SIZE; i++)
		v[i] = i;
	random_shuffle( v.begin(), v.end() );

	binTree bt;
	vector<int>::iterator it;
	for (it=v.begin(); it!=v.end(); it++)
		bt.insert( *it );

	cout << "Height: " << bt.height() << endl;
	cout << "Size: " << bt.size() << endl;
	cout << "In order traverse (displaying first " << MAX_COUNT << " numbers): " << endl;
	mcount = rcount = 0;
	bt.inorder( display );
	cout << "\n\nPre order traverse (displaying first " << MAX_COUNT << " numbers): " << endl;
	mcount = rcount = 0;
	bt.preorder( display );
	cout << "\n\nPost order traverse (displaying first " << MAX_COUNT << " numbers): " << endl;
	mcount = rcount = 0;
	bt.postorder( display );

	cout << endl;
	return 0;
}

#endif
