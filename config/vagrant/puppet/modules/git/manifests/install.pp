# Simple git install
class git::install {

    package { 'git':
        ensure => present,
    }

}
