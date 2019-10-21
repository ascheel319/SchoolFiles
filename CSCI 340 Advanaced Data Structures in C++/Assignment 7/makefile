#Compiler Variables
CCFLAGS = -Wall -std=c++11

#Rule to link obj code to create exe file
assignment7.exe: assignment7.o
	g++ $(CCFLAGS) -o assignment7.exe assignment7.o

#Rule to compile source code file to obj code
assignment7.o: assignment7.cc
	g++ $(CCFLAGS) -c assignment7.cc

#For the clean command
clean:
	-rm *.o assignment7.exe
