#Compiler Variables
CCFLAGS = -Wall -std=c++11

#Rule to link object code to create execrutable file
assignment3.exe: assignment3.o
	g++ $(CCFLAGS) -o assignment3.exe assignment3.o

#Rule to compile source code file to object code
assignment3.o: assignment3.cc
	g++ $(CCFLAGS) -c assignment3.cc

#Pseudo-target to remove object code and executable files
clean:
	-rm *.o assignment3.exe
