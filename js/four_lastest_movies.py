import sys

with open("js/movies.csv", 'r') as file:
    movieList = [file.readline(), file.readline(), file.readline(), file.readline(), file.readline()]
    while movieList[4]:
        movieList.pop(0)
        line = file.readline()
        movieList.append(line)
    movieList.pop(4)
    print(movieList[0].split(',')[1].split(' (')[0] + '|' +
          movieList[1].split(',')[1].split(' (')[0] + '|' +
          movieList[2].split(',')[1].split(' (')[0] + '|' +
          movieList[3].split(',')[1].split(' (')[0])
    file.close()