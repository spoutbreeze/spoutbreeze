package org.spoutbreeze.spoutbreezemanager.repository;

import org.spoutbreeze.commons.entities.Agent;
import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.stereotype.Repository;

import java.util.List;
import java.util.Optional;

@Repository
public interface AgentRepository extends JpaRepository<Agent, Long> {

    List<Agent> findAllByStatus(final String status);

    @Override
    Optional<Agent> findById(Long id);

}
