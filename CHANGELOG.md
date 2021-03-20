# Changelog

All notable changes to this project will be documented in this file.

The format is based on [keep a changelog][xtlink-keep-a-changelog]
and this project adheres to [Semantic Versioning 2.0.0][xtlink-semantic-versioning].

## [0.3.0] - 2021-03-20

### Added

* `CODE_OF_CONDUCT.md`

### Changed

* `UserEntityInterface` and `UserEntity`
* `UsersRepositoryInterface` and `UsersRepository`

### Fixed

* PHPDoc

[0.3.0]: https://github.com/codekandis/tiphy-authentication-integration/compare/0.2.0..0.3.0

---
## [0.2.0] - 2021-02-25

### Changed

* using transaction by closure

[0.2.0]: https://github.com/codekandis/tiphy-authentication-integration/compare/0.1.0..0.2.0

---
## [0.1.0] - 2021-02-17

### Added

* `UsersEntityInterface` representing the interface of all users entities
* `UsersEntity` representing the default users entity
* `UsersRepositoryInterface` representing the interface of all users repositories
* `UsersRepository` representing the default users repository
* `UnauthorizedAction` representing a default API action responding a `401 Unauthorized`
* `AuthorizationHeaderKeyAuthenticationPreDispatcher` representing a pre dispatcher handling key based HTTP Authorization headers 

[0.1.0]: https://github.com/codekandis/tiphy-authentication-integration/tree/0.1.0



[xtlink-keep-a-changelog]: http://keepachangelog.com/en/1.0.0/
[xtlink-semantic-versioning]: http://semver.org/spec/v2.0.0.html
