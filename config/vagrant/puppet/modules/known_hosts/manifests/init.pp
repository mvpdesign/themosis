# -*- mode: ruby -*-
# vi: set ft=ruby :

class known_hosts( $username = 'root' ) {
    $group = $username
    $server_list = [ 'github.com' ]

    file{ '/root/.ssh' :
      ensure => directory,
      group => $group,
      owner => $username,
      mode => 0755,
    }

    file{ '/root/.ssh/known_hosts' :
      ensure => file,
      group => $group,
      owner => $username,
      mode => 0755,
      require => File[ '/root/.ssh' ],
    }

    file{ '/tmp/known_hosts.sh' :
      ensure => present,
      mode => 0755,
      source => 'puppet:///modules/known_hosts/known_hosts.sh',
    }

    exec{ 'add_known_hosts' :
      command => "/tmp/known_hosts.sh",
      path => "/sbin:/usr/bin:/usr/local/bin/:/bin/",
      provider => shell,
      user => 'root',
      require => File[ '/root/.ssh/known_hosts', '/tmp/known_hosts.sh' ]
    }
}
