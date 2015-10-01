import os, requests

movie_dir = ".."
movies = [name for name in os.listdir(movie_dir) if os.path.isdir(movie_dir+"/"+name)]

data = [{"title": t} for t in movies]

r = requests.post('http://movies.dev/api/v1/movies', json=data)
#print(r.status_code)
#print(r.headers)
#print(r.text)
