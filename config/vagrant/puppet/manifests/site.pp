# Enable XDebug ("0" | "1")
$use_xdebug = "0"

# Default path
Exec
{
  path => ["/usr/bin", "/bin", "/usr/sbin", "/sbin", "/usr/local/bin", "/usr/local/sbin"]
}

exec {'apt-update':
  path    => '/usr/bin',
  command => 'apt-get update',
  require => Exec['add php55 apt-repo']
}

include bootstrap
include other #curl and sqlite
include php55 #specific setup steps for 5.5
include php
include apache
include mysql
include redis
include memcached
include known_hosts
include git
include composer
