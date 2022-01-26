# slim-react
Реализация аукциона. Docker + Deploy на Production

# commands Ansible
ansible all -m ping -i hosts.yml

# deploy on Server
REGISTRY=goohunter.new-sert.ru IMAGE_TAG=master-1 BUILD_NUMBER=1 make build
REGISTRY=goohunter.new-sert.ru IMAGE_TAG=master-1 BUILD_NUMBER=1 make push
HOST=deploy@195.161.68.104 PORT=49347 REGISTRY=goohunter IMAGE_TAG=master-1 BUILD_NUMBER=1 make deploy
