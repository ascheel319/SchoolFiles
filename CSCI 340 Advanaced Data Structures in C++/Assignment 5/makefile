#Compile Variables
CCFLAGS = -Wall -std=c++11

#Rule to link object code to create executable file
assignment5.exe: assignment5.o
	g++ $(CCFLAGS) -o assignment5.exe assignment5.cc

#Rule to compile source code files to object code
assignment5.o: assignment5.cc assignment5.h
	g++ $(CCFLAGS) -c assignment5.cc

#Pseudo-target to remove object code and exe file
clean:
	-rm *.o assignment5.exe
