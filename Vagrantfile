# -*- mode: ruby -*-
# vi: set ft=ruby :

# vagrant_dir = File.expand_path(File.dirname(__FILE__))

Vagrant.configure("2") do |config|
    # - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

    # Forward Agent
    #
    # Enable agent forwarding on vagrant ssh commands. This allows you to use ssh keys
    # on your host machine inside the guest. See the manual for `ssh-add`.
    config.ssh.forward_agent = true

    # - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

    # Default Box Setup
    #
    # Every Vagrant virtual environment requires a box to build off of.
    config.vm.box = "hashicorp/precise32"

    # The url from where the 'config.vm.box' box will be fetched if it
    # doesn't already exist on the user's system.
    # config.vm.box_url = "http://files.vagrantup.com/precise32.box"

    config.vm.hostname = "mvpdesign"

    # Configure A Private Network IP
    config.vm.network :private_network, ip: "192.168.10.10"

    # Configure Port Forwarding To The Box
    config.vm.network "forwarded_port", guest: 80, host: 8000
    config.vm.network "forwarded_port", guest: 443, host: 44300
    config.vm.network "forwarded_port", guest: 3306, host: 33060
    config.vm.network "forwarded_port", guest: 5432, host: 54320

    # - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

    # Local Machine Hosts
    #
    # If the vagrant plugin hostsupdater is installed this will manage stuff

    if defined? VagrantPlugins::HostsUpdater
        config.hostsupdater.aliases = ["#{config.vm.hostname}.dev"]
        config.hostsupdater.remove_on_suspend = true
    end

    # - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

    # Fine Tuning
    #
    # Provider-specific configuration so you can fine-tune various
    # backing providers for Vagrant. These expose provider-specific options.
    config.vm.provider :virtualbox do |vb|
        vb.customize ["modifyvm", :id, "--natdnshostresolver1", "on"]
        vb.customize ["modifyvm", :id, "--memory", "1024"]
    end

    config.vm.synced_folder ".", "/home/vagrant/", :mount_options => [ "dmode=775", "fmode=775" ]

    # - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

    # Provisioning
    #
    # Initiate the different types of provisioning including puppet

    # Add github to the list of known_hosts
    config.vm.provision :shell do |shell|
        shell.inline = "mkdir $1 && touch $2 && ssh-keyscan -H $3 >> $2 && chmod 600 $2"
        shell.args = %q{/root/.ssh /root/.ssh/known_hosts "github.com"}
    end

    # Provision
    config.vm.provision :shell, :path => "config/vagrant/provision/provision.sh"

    # Puppet
    config.vm.provision :puppet do |puppet|
        puppet.manifests_path = 'config/vagrant/puppet/manifests'
        puppet.module_path    = 'config/vagrant/puppet/modules'
        puppet.manifest_file  = 'init.pp'
        puppet.options        = '--verbose --debug'
    end

    # Post Provision
    config.vm.provision :shell, :path => "config/vagrant/provision/post-provision.sh"

    # - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

    # Sync folders
    #
    # Sync the public/ folder
    config.vm.synced_folder "public/", "/var/www/", :mount_options => [ "dmode=775", "fmode=775" ]
end
