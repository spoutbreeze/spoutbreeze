package org.spoutbreeze.commons.repository;

import org.spoutbreeze.commons.entities.Broadcast;
import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.stereotype.Repository;

@Repository
public interface BroadcastRepository extends JpaRepository<Broadcast, Long> {
}
