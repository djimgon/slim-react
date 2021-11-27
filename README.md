# slim-react
Реализация аукциона. Docker + Deploy на Production

# commands Ansible
ansible all -m ping -i hosts.yml

# deploy on Server
REGISTRY=registry.deworker.pro IMAGE_TAG=master-1 make build
REGISTRY=registry.deworker.pro IMAGE_TAG=master-1 make push
HOST=deploy@95.213.251.60 PORT=22 REGISTRY=registry.deworker.pro IMAGE_TAG=master-1 BUILD_NUMBER=1 make deploy
