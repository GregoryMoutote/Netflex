import sys

def movie_seeker(id):
    with open("js/movies.csv", 'r') as file:
        target = id
        iterator = 1
        file.readline()
        while iterator < (int)(target):
            file.readline()
            iterator = iterator + 1
        line = file.readline()
        file.close()
        if line != "":
            return line.split(',')[1].split('(')[0]
        else:
            return ''

def sortByMean(meanRatingsList):
    size = len(meanRatingsList)
    for firstIterator in range(size):
        for secondIterator in range(0, size - firstIterator - 1):
            if meanRatingsList[secondIterator][1] > meanRatingsList[secondIterator + 1][1]:
                meanRatingsList[secondIterator], meanRatingsList[secondIterator + 1] = \
                    meanRatingsList[secondIterator + 1], meanRatingsList[secondIterator]


with open("js/ratings.csv", 'r') as file:
    movieRatingsList = [[0, 0, 0, 0, 0, 0]]
    line = file.readline()
    line = file.readline()
    tabSize = 1
    movie = 0
    rating = 0
    while line:
        movie = int(line.split(',')[1])
        rating = int(line.split(',')[2])
        while tabSize < movie:
            movieRatingsList.append([0, 0, 0, 0, 0, 0])
            tabSize += 1
        if rating < 6:
            movieRatingsList[movie - 1][rating] += 1
        line = file.readline()
    iterator = 0
    ratingsAverage = []
    while iterator < tabSize:
        rating = movieRatingsList[iterator][0] + movieRatingsList[iterator][1] + movieRatingsList[iterator][2] + \
                 movieRatingsList[iterator][3] + movieRatingsList[iterator][4] + movieRatingsList[iterator][5]
        value = movieRatingsList[iterator][1] + 2 * movieRatingsList[iterator][2] + 3 * movieRatingsList[iterator][3] + \
               4 * movieRatingsList[iterator][4] + 5 * movieRatingsList[iterator][5]
        if rating != 0:
            ratingsAverage.append(float(value) / float(rating))
        else:
            ratingsAverage.append(0)
        iterator += 1
    fourMostPopular = [[1, ratingsAverage[0]], [2, ratingsAverage[1]], [3, ratingsAverage[2]], [4, ratingsAverage[3]]]
    sortByMean(fourMostPopular)
    iterator = 4
    while iterator < tabSize:
        if ratingsAverage[iterator] > fourMostPopular[0][1]:
            fourMostPopular[0] = [iterator + 1, ratingsAverage[iterator]]
            sortByMean(fourMostPopular)
        iterator += 1
    print(movie_seeker(fourMostPopular[0][0]) + '|' +
          movie_seeker(fourMostPopular[1][0]) + '|' +
          movie_seeker(fourMostPopular[2][0]) + '|' +
          movie_seeker(fourMostPopular[3][0]))
    file.close()