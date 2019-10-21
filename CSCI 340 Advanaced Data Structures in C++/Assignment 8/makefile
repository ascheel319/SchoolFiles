#Compiler Variables
CCFLAGS = -Wall -std=c++11

#Rule to link obj code to create exe file
assignment8.exe: assignment8.o
	g++ $(CCFLAGS) -o assignment8.exe assignment8.cc

#Rule to compile source code into obj code
assignment8.o: assignment8.cc assignment8.h
	g++ $(CCFLAGS) -c assignment8.cc

#to delete the files
clean:
	-rm *.o assignment8.exe
