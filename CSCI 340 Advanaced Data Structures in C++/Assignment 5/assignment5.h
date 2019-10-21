#ifndef ASSIGNMENT5
#define ASSIGNMENT5

class binTree;
class BST;

class Node
{
	int data;
	Node* next;
	Node* left;
	Node* right;

	friend class binTree;

	public:
		Node(int& d, Node* n = NULL)
		{
			data = d;
			left = n;
			right = n;
		}
};

class binTree
{
	public:
		binTree();			//default constructor
		virtual void insert( int );	//inserts a node in tree
		int height() const;		//return height of tree
		unsigned size() const;		//return size of tree
		void inorder( void(*)(int) );	//inorder traversal of tree
		void preorder( void(*)(int) );	//preorder traversal
		void postorder( void(*)(int) );	//postorder taversal

	protected:
		Node* root;			//root of tree

	private:
		void insert( Node*&, int );		//private version of insert
		int height( Node* ) const;		//private version of height
		unsigned size( Node* ) const;		//private version of size
		void inorder( Node*, void(*)(int) );	//private version of inorder
		void preorder( Node*, void(*)(int) );	//private version of preorder
		void postorder( Node*, void(*)(int) );	//private version of postorder
};

#endif
