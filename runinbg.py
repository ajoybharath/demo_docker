import docker
client = docker.from_env()
print client.containers.run("alpine", ["echo", "hello", "world"])

## RUN IN BG ##

import docker
client = docker.from_env()
container = client.containers.run("bfirsh/reticulate-splines", detach=True)
print container.id
