#Complier Variables
CCFLAGS = -Wall -std=c++11

#Rule to link object code to create executable file
assignment4.exe: assignment4.o
	g++ $(CCFLAGS) -o assignment4.exe assignment4.cc

#Rule to compile source code file to object code
assignment4.o: assignment4.cc assignment4.h
	g++ $(CCFLAGS) -c assignment4.cc

#Pseudo-target to remove object code and exe file
clean:
	-rm *.o assignment4.exe
