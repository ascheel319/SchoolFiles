# Compiler Variables
CCFLAGS = -Wall -std=c++11

# Rule to link object code files to create executable file
assignment6.exe: assignment6main.o assignment5.o assignment6.o
	g++ $(CCFLAGS) -o assignment6.exe assignment6main.cc assignment5.cc assignment6.cc

assignment6main.o: assignment6main.cc assignment5.h assignment6.h
	g++ $(CCFLAGS) -c assignment6main.cc

assignment5.o: assignment5.cc assignment5.h
	g++ $(CCFLAGS) -c assignment5.cc

assignment6.o: assignment6.cc assignment6.h assignment5.h
	g++ $(CCFLAGS) -c assignment6.cc

# Pseudo-target to remove object code and exe files
clean:
	-rm *.o assignment6.exe
