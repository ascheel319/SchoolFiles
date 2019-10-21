/****************************************
Name:		Andrew Scheel
Z-ID:		Z1790270
Section:	section 3
Assignment:	Assignment 8
Due Date:	4/18/18
Purpose:	For this computer assignment, you are to write a C++
		program to create, search, print,and manage an item inventory.
****************************************/

#include <iomanip>
#include <iostream>
#include <fstream>
#include "assignment8.h"

using namespace std;

/****************************************
Function:	HT (a.k.a. the constructor)
Use:		default variable variables
Parameters:	s=11
Returns:	none
****************************************/
HT::HT(int s=11)
{
	table_size = s;
	item_count = 0;
	hTable = new vector<Entry>(s);
}

/****************************************
Function:	~HT (a.k.a. the deconstructor)
Use:		deletes the table
Parameters:	none
Returns:	none
****************************************/
HT::~HT()
{
	delete hTable;
}

/****************************************
Function:	search
Use:		This public member function searches
		the hash table for a record with a given key.
Parameters:	the key that is being looked for
Returns:	the position of the found item
****************************************/
int HT::search(const string& key)
{
	int hashval = hashing(key);

	for(int i = 0; i < table_size; i++)
	{
		if(hTable->at((i+hashval)%table_size).key == key)
		{
			return ((i + hashval) % table_size);//found it
		}
	}
	return -1;//can't find it
}

/****************************************
Function:	insert
Use:		This public member function inserts item e in the hash table.
Parameters:	the thing that is supposed to be inserted
Returns:	true if it is inserted
		false if it is not inserted
****************************************/
bool HT::insert(const Entry& e)
{
	if(item_count < table_size)
	{
		item_count++;
		int hash = hashing(e.key);
		for(int i = 0; i < table_size; i++)
		{
			if(hTable->at((i + hash)%table_size).key == "---")
			{
				hTable->at((i + hash)%table_size) = e;
				break;
			}
		}
	}
	return false;
}

/****************************************
Function:	remove
Use:		This public member function removes an item with given key s.
Parameters:	the entry that is to be deleted from the table
Returns:	false if the string is not found to be deleted
		true if the entry is deleted
****************************************/
bool HT::remove(const string& s)
{
	int i = search(s);
	if(i < 0)
		return false;
	else
	{
		Entry* newentry = new Entry();
		hTable->at(i) = *newentry;
		item_count--;
		return true;
	}
}

/****************************************
Function:	print
Use:		This public member function prints the existing entries in the
		hash table: the index value of the position, the key, and the
		description.
Parameters:	none
Returns:	none
****************************************/
void HT::print()//untested
{
	cout << "----Hash Table-----" << endl;
	for(auto i = hTable->begin(); i != hTable->end(); i++)
	{
		if(i->key != "---")
			cout << setw(2) << right << i - hTable->begin() << ": " << i->key << " " << i->description << endl;
	}
	cout << "-------------------" << endl;
}

/****************************************
Function:	get_entry
Use:		This method takes a line of input and parses it to create
		a new Entry.
Parameters:	the line that will become the entry
Returns:	the new entry that was made
****************************************/
Entry* get_entry (const string& line)
{
	Entry* thing = new Entry();
	thing->key = line.substr(line.find(':') + 1,3);
	thing->description = line.substr(line.find(':') + 5);
	return thing;
}

/****************************************
Function:	get_key
Use:		This method takes a line of input and parses it to
		return the item-key.
Parameters:	the line that the key is in
Returns:	the key
****************************************/
string get_key (const string& line)
{
	return line.substr(line.find(':') + 1);
}

// key is in form of letter-letter-digit
// compute sum <-- ascii(pos1)+ascii(pos2)+ascii(pos3)
// compute sum%htable_size
int HT::hashing(const string& key)
{
	return ((int)key[0] + (int)key[1] + (int)key[2])%table_size;
}

int main(int argc, char** argv )
{
	if ( argc < 2 )
	{
		cerr << "argument: file-name\n";
		return 1;
	}

	HT ht;
	ifstream infile(argv[1], ios::in);
	string line;
	infile >> line;
	while ( !infile.eof() )
	{
		if ( line[0] == 'A' )
		{
			Entry* e = get_entry( line );
			ht.insert( *e );
			delete e;
		}
        else
	{
            string key = get_key(line);
            if ( line[0] == 'D' ) {
                cout << "Removing " << key << "...\n";
                bool removed = ht.remove( key );
                if ( removed )
                    cout << key << " is removed successfully...\n\n";
                else
                    cout << key << " does not exist, no key is removed...\n\n";
            }
            else if ( line[0] == 'S' ) {
                int found = ht.search( key );
                if ( found < 0 )
                    cout << key << " does not exit in the hash table ..." << endl << endl;
                else
                   cout << key << " is found at table position " << found << endl << endl;
            }
            else if ( line[0] == 'P' ) {
                cout << "\nDisplaying the table: " << endl;
                ht.print();
            }
            else
                cerr << "wrong input: " << line << endl;
        }
        infile >> line;

    }

    infile.close();
    return 0;
}
