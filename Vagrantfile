# -*- mode: ruby -*-
# vi: set ft=ruby :

Vagrant.configure(2) do |config|
  # Every Vagrant virtual environment requires a box to build off of.
  config.vm.box = "hashicorp/precise32"

  config.vm.hostname = 'vagrant'
  # config.vm.box_url = "http://domain.com/path/to/above.box"

  # Create a forwarded port mapping which allows access to a specific port
  # within the machine from a port on the host machine. In the example below,
  # accessing "localhost:8080" will access port 80 on the guest machine.
  # config.ssh.forward_agent = true
  # config.vm.network :forwarded_port, guest: 80, host: 8888, auto_correct: true
  # config.vm.network :forwarded_port, guest: 3306, host: 8889, auto_correct: true
  # config.vm.network :forwarded_port, guest: 5432, host: 5433, auto_correct: true

  # Create a public network, which generally matched to bridged network.
  # Bridged networks make the machine appear as another physical device on
  # your network.
  # config.vm.network :public_network
  config.vm.network :private_network, ip: '192.168.56.14'
  config.hostsupdater.aliases = ["#{config.vm.hostname}.local"]

  # If true, then any SSH connections made will enable agent forwarding.
  # Default value: false
  config.ssh.private_key_path = [ '~/.vagrant.d/insecure_private_key', '~/.ssh/id_rsa' ]
  config.ssh.forward_agent = true

  config.vm.synced_folder "public", "/var/www", {:mount_options => ['dmode=777','fmode=777']}

  # Provider-specific configuration so you can fine-tune various
  # backing providers for Vagrant. These expose provider-specific options.
  config.vm.provider :virtualbox do |vb|
    vb.customize ["modifyvm", :id, "--natdnshostresolver1", "on"]
    vb.customize ["modifyvm", :id, "--memory", "1024"]
  end

  config.vm.provision :puppet do |puppet|
    puppet.manifests_path = 'config/vagrant/puppet/manifests'
    puppet.module_path    = 'config/vagrant/puppet/modules'
    puppet.manifest_file  = 'site.pp'
    puppet.options        = '--verbose --debug'
  end

  config.vm.provision :shell, :path => "config/vagrant/puppet/scripts/post_provision.sh"
end
