#Compiler Variables
CCFLAGS = -Wall -std=c++11

#Rule to link obj code to create exe file
assignment9.exe: assignment9.o
	g++ $(CCFLAGS) -o assignment9.exe assignment9.cc

#Rule to compile source code into obj code
assignment9.o: assignment9.cc assignment9.h
	g++ $(CCFLAGS) -c assignment9.cc

#to delete the files
clean:
	-rm *.o assignment9.exe
