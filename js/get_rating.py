import sys

def idSeeker(movieTitle):
    with open("js/movies.csv", 'r') as file:
        target = movieTitle
        line = file.readline()
        id = 0
        while line:
            line = file.readline()
            if line and line.split(',')[1].split(" (")[0] == target:
                id = line.split(',')[0]
        file.close()
        return id

with open("js/ratings.csv", 'r') as file:
    movieRatings = [0, 0, 0, 0, 0, 0]
    file.readline()
    line = file.readline()
    id = str(idSeeker(sys.argv[1]))
    while line:
        if line.split(',')[1] == id:
            movieRatings[int(line.split(',')[2])] += 1
        line = file.readline()
    mean = 0
    rating = movieRatings[0] + movieRatings[1] + movieRatings[2] + \
             movieRatings[3] + movieRatings[4] + movieRatings[5]
    value = movieRatings[1] + 2 * movieRatings[2] + 3 * movieRatings[3] + \
           4 * movieRatings[4] + 5 * movieRatings[5]
    if rating != 0:
        mean = float(value) / float(rating)
    print(round(mean, 1))
    file.close()