#Compiler Variables
CCFLAGS = -Wall -std=c++11

#Rule to link object code to create executable file
assignment2: assignment2.o
	g++ $(CCFLAGS) -o assignment2 assignment2.o

#Rule to compile source code file to object code
assignment2.o: assignment2.cc
	g++ $(CCFLAGS) -c assignment2.cc

#Pseudo-target to remove object code and executable file
clean:
	-rm *.o assignment2
