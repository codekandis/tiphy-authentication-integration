# Changelog

All notable changes to this project will be documented in this file.

The format is based on [keep a changelog][xtlink-keep-a-changelog]
and this project adheres to [Semantic Versioning 2.0.0][xtlink-semantic-versioning].

## [0.10.0] - 2022-06-24

### Added

* LDAP authenticator configuration
* LDAP session authenticator configuration

[0.10.0]: https://github.com/codekandis/tiphy-authentication-integration/compare/0.9.0..0.10.0

---
## [0.9.0] - 2022-05-12

### Added

* session authenticator configuration
* session authenticator configuration registry trait

[0.9.0]: https://github.com/codekandis/tiphy-authentication-integration/compare/0.8.2..0.9.0

---
## [0.8.2] - 2021-11-08

### Fixed

* user entity propery mappings

[0.8.2]: https://github.com/codekandis/tiphy-authentication-integration/compare/0.8.1..0.8.2

---
## [0.8.1] - 2021-11-06

### Fixed

* implementation of `codekandis/persistence`

[0.8.1]: https://github.com/codekandis/tiphy-authentication-integration/compare/0.8.0..0.8.1

---
## [0.8.0] - 2021-10-18

### Changed

* implemented `codekandis/converters` to replace converter implementations
* implemented `codekandis/entities` to replace entity implementations
* implemented `codekandis/persistence` to replace persistence implementations

[0.8.0]: https://github.com/codekandis/tiphy-authentication-integration/compare/0.7.0..0.8.0

---
## [0.7.0] - 2021-10-10

### Changed

* removes the query by transaction from the users repository.

[0.7.0]: https://github.com/codekandis/tiphy-authentication-integration/compare/0.6.0..0.7.0

---
## [0.6.0] - 2021-10-06

### Changed

* used converter in the `UserEntityPropertyMapping`

[0.6.0]: https://github.com/codekandis/tiphy-authentication-integration/compare/0.5.0..0.6.0

---
## [0.5.0] - 2021-10-05

### Added

* request URI to the authentication pre-dispatcher

[0.5.0]: https://github.com/codekandis/tiphy-authentication-integration/compare/0.4.2..0.5.0

---
## [0.4.2] - 2021-04-18

### Fixed

* adds missing user entity property mappings

[0.4.2]: https://github.com/codekandis/tiphy-authentication-integration/compare/0.4.1..0.4.2

---
## [0.4.1] - 2021-04-18

### Fixed

* uses the mapped user in the users repository

[0.4.1]: https://github.com/codekandis/tiphy-authentication-integration/compare/0.4.0..0.4.1

---
## [0.4.0] - 2021-04-18

### Added

* user entity property mapping

[0.4.0]: https://github.com/codekandis/tiphy-authentication-integration/compare/0.3.0..0.4.0

---
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
