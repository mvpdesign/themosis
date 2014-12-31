class other
{
    package
    {
        "curl":
            ensure  => present,
            require => Exec['apt-update']
    }
    package
    {
        "sqlite":
            ensure  => present,
            require => Exec['apt-update']
    }
}