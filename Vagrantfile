# -*- mode: ruby -*-
# vi: set ft=ruby :

Vagrant.configure(2) do |config|
  # an alternative to this Ubuntu 14.04 box is the "v0rtex/xenial64" with the 16.04 LTS
  config.vm.box = "ubuntu/trusty64" 
  # access a port on your host machine (via localhost) and have all data forwarded to a port on the guest machine.
  config.vm.network "forwarded_port", guest: 9092, host: 9092
  # Create a private network, which allows host-only access to the machine
  # using a specific IP.
  config.vm.network "private_network", ip: "dhcp"
  config.disksize.size = '20GB'
  
  config.vm.provider "virtualbox" do |vb|
    vb.name = 'docker-compose-vm'
    vb.memory = 4096
    vb.cpus = 1
    vb.customize ["modifyvm", :id, "--natdnshostresolver1", "on"]
    vb.customize ["modifyvm", :id, "--natdnsproxy1", "on"]
  end

  # set up Docker in the new VM:
  config.vm.provision :docker
  # install docker-compose into the VM
  config.vm.provision "shell", inline: <<-EOC
    test -e /usr/local/bin/docker-compose || \\
    curl -sSL https://github.com/docker/compose/releases/download/1.5.1/docker-compose-`uname -s`-`uname -m` \\
      | sudo tee /usr/local/bin/docker-compose > /dev/null
    sudo chmod +x /usr/local/bin/docker-compose
  EOC
end
