import sys

with open("js/movies.csv", 'r') as file:
    target = int(sys.argv[1])
    iterator = 1
    file.readline()
    while iterator < target:
        file.readline()
        iterator = iterator + 1
    line = file.readline()
    if line != "":
        print(line.split(',')[1].split('(')[0])
    file.close()