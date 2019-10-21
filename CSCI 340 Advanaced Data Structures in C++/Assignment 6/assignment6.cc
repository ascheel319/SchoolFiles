/****************************************
Name:		Andrew Scheel
Z-ID:		Z1790270
Section:	section 3
Assignment:	assignment 6
Due Date:	March 22 2018
Purpose:	For this computer assignment, implement
		a derived class to represent a binary search
		tree.
****************************************/

#include <iostream>
#include "assignment5.h"
#include "assignment6.h"
using namespace std;

//_______________________public methods______________________________

/****************************************
Function:	insert
Use:		to call the private method
Parameters:	a number to insert
Returns:	none
****************************************/
void BST::insert(int x)
{
	//just call the private insert
	insert(root, x);
}

/****************************************
Function:	search
Use:		to call the private method
Parameters:	a number to find
Returns:	true if the number is found and
		false if it is not found
****************************************/
bool BST::search(int x)
{
	//just call the private search
	return search(root, x);
}

/****************************************
Function:	remove
Use:		to call the private method
Parameters:	a number to remove
Returns:	true if the number is removed and
		false if the number isn't removed
****************************************/
bool BST::remove(int x)
{
	//just call the private remove
	return remove(root, x);
}

/****************************************
Function:	sumLeftLeaves
Use:		calls the private method
Parameters:	none
Returns:	the number of the left leaves
****************************************/
int BST::sumLeftLeaves()
{
	//just call the private sumLeftLeaves
	return sumLeftLeaves(root);
}
//______________end of public methods________________________________

//______________private methods______________________________________

/****************************************
Function:	insert
Use:		to insert a number into a node
Parameters:	a node to insert into and a number to insert
Returns:	none
****************************************/
void BST::insert(Node*& n, int x)
{
	//insert an item in the tree
	if(n == NULL)
		n = new Node(x);
	else if(n->data > x)
		insert(n->left, x);
	else
		insert(n->right, x);
}

/****************************************
Function:	search
Use:		to search the node for a number
Parameters:	a node to search through and a number to search for
Returns:	true if the number is found
		false if the number isn't found
****************************************/
bool BST::search(Node*& n, int x)
{
	//search an item in the tree
	if(n == NULL)
		return false;
	else
	{
		if(n->data == x)
			return true;
		else if(n->data > x)
			return search(n->left, x);
		else
			return search(n->right, x);
	}
//return true;
}

/****************************************
Function:	remove
Use:		to remove a number from a node
Parameters:	a node to remove from and a number to remove
Returns:	true if it removes the number
		false if it doesn't remove the number
****************************************/
bool BST::remove(Node*& n, int x)
{
	//removes an item in the tree and returns true when successful
	if(n == NULL)
		return false;//stops it
	if(n->data > x)
		return remove(n->left, x);
	if(n->data < x)
		return remove(n->right, x);
	if(n->left != NULL && n->right != NULL)//check to see if they both are ! NULL
	{
		Node* pred = n->left;
		while(pred->right != NULL)
			pred = pred->right;
		n->data = pred->data;
		remove(n->left, n->data);
	}
	else if(n->left == NULL && n->right == NULL)//if it is a leaf it wont have any leaves
	{
		delete n;
		n = NULL;//not sure if this is right or not
	}
	else//n has one child
	{
		Node* temp = n;
		if(n->left == NULL)
			n = n->right;
		else
			n = n->left;
		delete temp;
	}
	return true;
}

/****************************************
Function:	sumLeftLeaves
Use:		to get the sum of all the LEFT leaves
Parameters:	a node
Returns:	the sum of the leaves
****************************************/
int BST::sumLeftLeaves(Node* & node)
{
	// Initialize result
	int leftys = 0;

	// Update result if root is not NULL
	if (node != NULL)
	{
		// If left of root is NULL, then add key of
		// left child
		if(node->left != NULL)
		{
			if (node->left->left == NULL && node->left->right == NULL)
				leftys += node->left->data;
			else// Else recur for left child of root
				leftys += sumLeftLeaves(node->left);
		}
	// Recur for right child of root and update res
	leftys += sumLeftLeaves(node->right);
	}

	return leftys;
}

//______________end of private methods_______________________________
