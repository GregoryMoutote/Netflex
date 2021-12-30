import sys

with open("js/movies.csv", 'r') as file:
    limit = 30
    target = sys.argv[1]
    results = []
    line = file.readline()
    while line:
        line = file.readline()
        if line and line.split(',')[1].split(" (")[0].__contains__(target):
            results.append(line.split(',')[1].split(" (")[0])
            if len(results) == limit:
                break
    print(results)
    tabSize = len(results)
    toReturn = ""
    for iterator in range(tabSize - 1):
        toReturn += results[iterator] + '|'
    toReturn += results[tabSize - 1]
    print(toReturn)
    file.close()